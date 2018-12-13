<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    public function index($id){

    	$categories = Category::all();
    	$category= Category::findOrFail($id);
        
        return view('products',compact('categories', 'category'));

    }
}
