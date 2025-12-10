<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


// GET -> Menampilkan data
// POST -> Menambah data
// PUT -> Mengubah data
// DELETE -> Menghapus data
// PATCH -> Mengubah sebagian data


Route::get('/', function () {
    return view('home');
});
Route::get('/about', function(){
    return view('about');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index']);