<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Category;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menggunakan user_id dari username yang sedang login
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id); 

        //fitur search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        //menampilkam 5 data per halaman dengan pagination
        return view('dashboard.index', [
            'posts' => $posts->paginate(5)-> withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            // Custom Messages
            'title.required' => 'Field Title wajib diisi',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib diilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi',
            'body.required' => 'Field Content wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $slug = Str::slug($request->title);
    
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'excerpt' => $validated['excerpt'] ?? null,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorizeUser($post);
        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorizeUser($post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string|min:10',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->title);
        if ($slug !== $post->slug) {
            $originalSlug = $slug;
            $count = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        }

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'excerpt' => $validated['excerpt'] ?? $post->excerpt,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.show', $post->slug)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorizeUser($post);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully');
    }

    /**
     * Authorize user ownership of post
     */
    private function authorizeUser(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }
}