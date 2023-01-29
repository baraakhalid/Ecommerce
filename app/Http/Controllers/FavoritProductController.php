<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FavoritProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavoritProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requset)
    {
        $products=$requset->user()->products()->latest()->get();
        $numOfProductsFavorite=FavoritProduct::where('user_id' , $requset->user()->id)->count();
        $numOfProductsCart=Cart::where('user_id' , $requset->user()->id)->count();       
     
        return response()->view('front.favorite',['products'=>$products,'numOfProductsFavorite'=>$numOfProductsFavorite, 'numOfProductsCart'=>$numOfProductsCart]);
    }
    
    public function showFavorit(Request $requset)
    {
        $data=$requset->user()->products()->latest()->get();
         
        return response()->json(['message'=>'success' , 'data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               $validator = Validator($request->all(), [
            'product_id' => 'required|numeric|exists:products,id'
                   
        ]);
        if (!$validator->fails()) {
            $product = Product::find($request->product_id);
            // $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            if(!is_null($product)) {
                if(! $request->user()->favorites()->where('product_id' , $product->id)->exists()){
                    $isSaved = $request->user()->products()->save($product);
                      if( $isSaved){
            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
                        

                      return response()->json(
                        ['message' =>  'Product added to favorite' ,'numOfProductsFavorite'=>$numOfProductsFavorite]);
                    }
                    
                }
                    else{
                        $isSaved = $request->user()->products()->detach($product);
                        if( $isSaved)
                     {  
            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();


                        return response()->json(
                            ['message' => 'Product deleted from favorite' ,'numOfProductsFavorite'=>$numOfProductsFavorite]);}
                    }
           
                   
               }
                else{
                    return response()->json(
                        ['message' => 'Product not found ']);
                }
            
        }
        else{
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }  
        // if (! $request->user()->wishlistHas(request('productId'))) {
        //     $request->user()->products()->attach(request('productId'));
        //     return response() -> json(['status' => true , 'wished' => true]);
        // }
        // return response() -> json(['status' => true , 'wished' => false]); 
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoritProduct  $favoritProduct
     * @return \Illuminate\Http\Response
     */
    public function show(FavoritProduct $favoritProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoritProduct  $favoritProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoritProduct $favoritProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavoritProduct  $favoritProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoritProduct $favoritProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoritProduct  $favoritProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $productId)
    {
        if(auth()->check()) {
            $request->user()->products()->detach($productId);
        }
        else {
            return redirect()->back()->withErrors(['You must be logged in to manage your wishlist !']);
        }
    }
    
}
