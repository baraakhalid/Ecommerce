<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_offers=ProductOffer::all();
        $products=Product::all();

        return response()->view('admin.offers.home',['product_offers'=>$product_offers,'products '=>$products ]);       
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();


        return response()->view('admin.offers.create',['products'=>$products]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = [
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'product_id' => 'required|numeric|exists:products,id',
            'discount' => 'required',




        ];
       

        $this->validate($request, $roles);

        $productoffer= new ProductOffer();
        $productoffer->start_date=$request->get('start_date');
        $productoffer->end_date=$request->get('end_date');
        $productoffer->product_id=$request->get('product_id');
        $productoffer->discount=$request->get('discount');
       
        $isSaved=$productoffer->save();

        
  

        if ($isSaved){
            return redirect()->back()->with('status', __('cp.create'));
 
    }


     
    }     
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOffer $productOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOffer $productOffer)
    {
        $products=Product::all();

        return response()->view('admin.offers.edit',['productOffer'=>$productOffer ,'products'=>$products]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOffer $productOffer)
    {
        $roles = [
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'product_id' => 'required|numeric|exists:products,id',
            'discount' => 'required',


        ];
       

        $this->validate($request, $roles);

        $productOffer->start_date=$request->get('start_date');
        $productOffer->end_date=$request->get('end_date');
        $productOffer->product_id=$request->get('product_id');
        $productOffer->discount=$request->get('discount');
       
       $isSaved=$productOffer->save();

        
  

        if ($isSaved){
            return redirect()->back()->with('status', __('cp.update'));
 
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOffer  $productOffer
     * @return \Illuminate\Http\Response
     */

     public function destroy(ProductOffer $productOffer)
     {
    
            $productOffer->delete();
             return "success";
         return "fail";
     }
 
    // public function destroy(ProductOffer $productOffer)
    // {
    //     //
    // }
}
