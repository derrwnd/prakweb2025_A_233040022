<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
   
    public function index()
    {
       
        $posts = Post::with(['author', 'category'])->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load(['author', 'category']);
        return view('post', compact('post'));
    }
}
