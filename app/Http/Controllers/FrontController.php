<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\FavoritProduct;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCoupon;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
 
            $categories = Category::all();
            $products=Product::all();
            $offers=ProductOffer::with('product')->get();

        if(auth('user')->check()){

            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();



            return response()->view('front.index', ['categories' => $categories , 'products'=>$products,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart ,'offers'=>$offers]);    
        }
        return response()->view('front.index', ['categories' => $categories , 'products'=>$products ,'offers'=>$offers]);    


    }

    public function getAffiliateProducts(Request $request)
   {
  $categoryId = $request->category_id;
  $affiliateProducts = Product::where('category_id', $categoryId)->where('affiliate', 1)->get();

  return response()->json($affiliateProducts);
   }
}
