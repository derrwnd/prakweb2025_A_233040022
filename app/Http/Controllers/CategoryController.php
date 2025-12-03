<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  index(){
        $categories = Category::all();

        return view('categories', ['categories' => $categories]);
    }
}