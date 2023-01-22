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
            // if(auth('user')->check() ){
           
            //     $total=Cart::where('user_id' ,'=' ,Auth::guard('user')->user()->id)->sum(DB::raw('quantity * price'));
           
            //     return response()->view('front.index', ['categories' => $categories , 'products'=>$products, 'total'=>$total]);    
            // }
            // else
            return response()->view('front.index', ['categories' => $categories , 'products'=>$products]);    


    }}
