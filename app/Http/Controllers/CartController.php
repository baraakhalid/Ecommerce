<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'Product_id' =>'required|numeric|exists:Products,id',
            'price' => 'required',
            'quantity' => 'required|integer|between:1,100',
            

        ]);

        if (!$validator->fails()) {
            $Product = Product::find($request->product_id);
            if (!is_null($Product)) {
                // if (!$request->user()->carts()->where('product_id', $Product->id)->exists()) {
                    $cart = new Cart();
                    $cart->Product_id= $request->Product_id;
                    $cart->user_id= $request->user()->id;
                    $cart->price= $request->price;
                    $cart->quantity= $request->quantity;


                    $isSaved = $cart->save();
                    if ($isSaved)
                    return response()->json(['message' => 'Product cart added']);
                
            } 
        //     else {
        //         return response()->json(['message' => 'Product Not Found']);
        // }
    }
        else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
