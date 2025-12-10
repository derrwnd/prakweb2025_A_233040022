<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    // Dashboard Category CRUD
    public function indexDashboard(){
        $categories = Category::all();
        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    public function createDashboard(){
        return view('dashboard.categories.create');
    }

    public function storeDashboard(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter',
            'name.unique' => 'Kategori dengan nama ini sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $slug = Str::slug($request->name);
        
        Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully');
    }

    public function editDashboard(Category $category){
        return view('dashboard.categories.edit', ['category' => $category]);
    }

    public function updateDashboard(Request $request, Category $category){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter',
            'name.unique' => 'Kategori dengan nama ini sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $slug = Str::slug($request->name);

        $category->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroyDashboard(Category $category){
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully');
    }
}