<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
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
            'total' => 'required',
            'address_id' => 'required|numeric|exists:addresses,id',
        ]);

        if (!$validator->fails()) {
            $order = new Order();
            $order->total = $request->total;
            $order->address_id = $request->input('address_id');
            $order->date = Carbon::now()->format('Y-m-d');
            $isSaved = $request->user()->orders()->save($order);
            if($isSaved)
           { $request->session()->forget('code');
			$request->session()->forget('type');}
            // $admins=Admin::all();
            // foreach ($admins as $admin) {
            //     $admin->notify(new NewOrderNotification($order));
            // }

            $cartproducts=Cart::where('user_id' ,'=' , $request->user()->id)->get();
            // dd($cartmeals);
            foreach($cartproducts as $cartproduct){
                $order_product = new OrderProduct();

                    $order_product->order_id = $order->id;
                    $order_product->product_id = $cartproduct->product_id;
                    $order_product->quantity = $cartproduct->quantity;
                    $isSaved = $order_product->save();
            }

            Cart::destroy($cartproducts);
            return response()->json(
                ['message' => $isSaved ? 'Order Saved successfully' : 'Order Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
