<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
 
     
            $categories = Category::all();
            $products=Product::all();
        //     $images=Image::where('object_id',)
            return response()->view('front.index', ['categories' => $categories , 'products'=>$products]);    

    }}
