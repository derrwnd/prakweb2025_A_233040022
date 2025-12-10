<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('Home');
});


// Route::get('/home', function () {
//     return view('Home');
// });

Route::get('/about', function () {
    return view('About');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/contact', function () {
    return view('Contact');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

//protect posts dan categories dengan auth middleware
//route dari latihanlaravel
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

//Route model Binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

//Route untuk register - middleware guest (hanya untuk yg belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

//Route untuk login - middleware guest (hanya untuk yg belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

//Route untuk logout - hanya untuk yg sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Route untuk dashboard posts - hanya untuk yang sudah login
//index - Menampilkan semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware('auth')->name('dashboard.index');

//Create - Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware('auth')->name('dashboard.create');

//Store - Simpan post baru
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware('auth')->name('dashboard.store');

//Show - Tampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth')->name('dashboard.show');

//Edit - Form untuk edit post
Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('auth')->name('dashboard.edit');

//Update - Update post
Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])->middleware('auth')->name('dashboard.update');

//Delete - Hapus post
Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware('auth')->name('dashboard.destroy');

// Category Dashboard CRUD
Route::get('/dashboard/categories', [CategoryController::class, 'indexDashboard'])->middleware('auth')->name('dashboard.categories.index');
Route::get('/dashboard/categories/create', [CategoryController::class, 'createDashboard'])->middleware('auth')->name('dashboard.categories.create');
Route::post('/dashboard/categories', [CategoryController::class, 'storeDashboard'])->middleware('auth')->name('dashboard.categories.store');
Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'editDashboard'])->middleware('auth')->name('dashboard.categories.edit');
Route::put('/dashboard/categories/{category}', [CategoryController::class, 'updateDashboard'])->middleware('auth')->name('dashboard.categories.update');
Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroyDashboard'])->middleware('auth')->name('dashboard.categories.destroy');


