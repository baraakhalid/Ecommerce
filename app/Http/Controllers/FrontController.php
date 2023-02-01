<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\FavoritProduct;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {

        $products=Product::all();
        $categoryId = $request->category_id;
        if($request->has('categoryId')){

            $products = Product::where('category_id', $categoryId)->get();
            return response()->json(['message'=>'success' ,'products' => $products]);


        }
        $categories = Category::all();
        if(auth('user')->check()){

            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();



            return response()->view('front.index', ['categories' => $categories , 'products'=>$products,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart]);    
        }
        return response()->view('front.index', ['categories' => $categories , 'products'=>$products]);    


    }

    public function getproducts($categoryId)
    {       

        $category = Category::find($categoryId);
        $products = $category->products;
        return response()->json(['message'=> 'dd', 'data'=>$products]);
    }

//     public function getAffiliateProducts(Request $request)
//    {
//   $categoryId = $request->category_id;
//   $affiliateProducts = Product::where('category_id', $categoryId)->get();

//   return response()->json($affiliateProducts);
//    }
}
 