<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
 
    //  dd(Auth::guard('user')->user()->id);
            $categories = Category::all();
            $products=Product::all();


            return response()->view('front.index', ['categories' => $categories , 'products'=>$products]);    


    }}
