<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FavoritProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use imageTrait;

    public function index(Request $request)
    {
        if($request->has('order_id')){
        $finalTotal=Order::where('user_id' ,'=' ,$request->user()->id)->where('id','=',$request->input('order_id'))->get();
        
        // dd($finalTotal->first()->total);
            $detailsorders = OrderProduct::with(['order' ,'product'])->where('order_id','=',$request->input('order_id'))->get();
            $subTotal=$detailsorders->sum('total');
            // sum(DB::raw('quantity * price'))
        if(auth('user')->check() ){
            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
        
            return response()->view('front.orderdetails',['detailsorders'=>$detailsorders,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart,'finalTotal'=>$finalTotal->first()->total ,'subTotal'=>$subTotal ]);
    }
    elseif(auth('admin')->check() ){
        return response()->view('admin.order-details.home',['detailsorders'=>$detailsorders]);
        
    }
}
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        //
    }
}
