<?php

namespace App\Http\Controllers;

use App\Models\ProductCoupon;
use Illuminate\Http\Request;

class ProductCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=ProductCoupon::all();
        return response()->view('admin.coupons.home',['coupons'=>$coupons]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.coupons.create'); 
        
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
            'start_date' => 'required|date|before:expire_date',
            'expire_date' => 'required|date|after:start_date',
            'code' => 'required|unique:product_coupons',
            'type' => 'required',
            'description' => 'nullable|min:3',
            'uses_times' => 'nullable|numeric',
            'greater_than' => 'nullable|numeric',
            'value' => 'required|numeric',
            'status' => 'nullable',

        ];
       

        $this->validate($request, $roles);

        $productCoupon= new ProductCoupon();
        $productCoupon->type=$request->get('type');
        $productCoupon->code=$request->get('code');
        $productCoupon->description=$request->get('description');
        $productCoupon->uses_times=$request->get('uses_times');
        $productCoupon->greater_than=$request->get('greater_than');
        $productCoupon->value=$request->get('value');
        $productCoupon->start_date=$request->get('start_date');
        $productCoupon->expire_date=$request->get('expire_date');
        $productCoupon->status = $request->has('status');
     
       
        $isSaved=$productCoupon->save();

        
  

        if ($isSaved){
            return redirect()->back()->with('status', __('cp.create'));
 
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCoupon  $productCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCoupon $productCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCoupon  $productCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCoupon $productCoupon)
    {
        $coupons=ProductCoupon::all();

        return response()->view('admin.coupons.edit' ,['productCoupon'=>$productCoupon ,'coupons'=>$coupons]); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCoupon  $productCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCoupon $productCoupon)
    {
        $roles = [
            'start_date' => 'required|date|before:expire_date',
            'expire_date' => 'required|date|after:start_date',
            'code' => 'required|unique:product_coupons,code,' . $productCoupon->id,
            'type' => 'required',
            'description' => 'nullable|min:3',
            'uses_times' => 'nullable|numeric',
            'greater_than' => 'nullable|numeric',
            'value' => 'required|numeric',
            'status' => 'nullable',

        ];
        
        $this->validate($request, $roles);

        $productCoupon->type=$request->get('type');
        $productCoupon->code=$request->get('code');
        $productCoupon->description=$request->get('description');
        $productCoupon->uses_times=$request->get('uses_times');
        $productCoupon->greater_than=$request->get('greater_than');
        $productCoupon->value=$request->get('value');
        $productCoupon->start_date=$request->get('start_date');
        $productCoupon->expire_date=$request->get('expire_date');
        $productCoupon->status = $request->has('status');
     
       
        $isSaved=$productCoupon->save();

        
  

        if ($isSaved){
            return redirect()->back()->with('status', __('cp.update'));
 
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCoupon  $productCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCoupon $productCoupon)
    {
        
            if ($productCoupon && $productCoupon->type != 1) {
               $productCoupon->delete();
                return "success";
            }
            return "fail";
        }
    }

