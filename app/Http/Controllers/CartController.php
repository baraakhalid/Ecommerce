<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\FavoritProduct;
use App\Models\Product;
use App\Models\ProductCoupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(111);
        if(auth('user')->check()){
            
            $data=Cart::with('product')->where('user_id' ,'=' ,$request->user()->id)->get();
            $total=Cart::where('user_id' ,'=' ,$request->user()->id)->sum(DB::raw('quantity * price'));

            return response()->json(['message'=>'success' , 'data' => $data ,'total' => $total]);

        }
    }
    public function showCart(Request $request)
    {
    
        if(auth('user')->check()){
            $addresses=Address::where('user_id' ,'=' ,$request->user()->id)->with(['city','area'])->get();
            $cities=City::get();
            $isFull=Cart::where('user_id', auth('user')->id())->exists();
            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
            $carts=Cart::with('product')->where('user_id' ,'=' ,$request->user()->id)->get();
            $total=Cart::where('user_id' ,'=' ,$request->user()->id)->sum(DB::raw('quantity * price'));
            return response()->view('front.cart',['carts'=>$carts,'isFull'=>$isFull ,'total'=>$total ,'addresses'=>$addresses ,'cities'=>$cities,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart]);

        }
    } 
    
    
    public function getTotal(Request $request){
        $total=Cart::where('user_id' ,'=' ,$request->user()->id)->sum(DB::raw('quantity * price'));
        return response()->json(['message'=>'success' ,'total' => $total]);
    }


    public function getareas($cityId)
    {       

        $city = City::find($cityId);
        $areas = $city->areas;
        return response()->json(['message'=> 'dd', 'data'=>$areas]);
    }
    public function getCoupon(Request $request)
    {
        $total=Cart::where('user_id' ,'=' ,$request->user()->id)->sum(DB::raw('quantity * price'));
        
        return response()->json(['message'=>'success','total' => $total]);
  

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
            'product_id' =>'required|numeric|exists:products,id',
            'size_id'=>'required|numeric|exists:sizes,id',
            'color_id'=>'required|numeric|exists:colors,id',
            'price' => 'required',
            'quantity' => 'required|integer',
            

        ]);

        if (!$validator->fails()) {
            $Product = Product::find($request->product_id);
            if (!is_null($Product)) {
                if (!$request->user()->carts()->where('product_id', $Product->id)->exists()) {
                    $cart = new Cart();
                    $cart->product_id= $request->product_id;
                    $cart->user_id= $request->user()->id;
                    $cart->price= $request->price;
                    $cart->quantity= $request->quantity;
                    $cart->color_id= $request->color_id;
                    $cart->size_id= $request->size_id;
                    $request->session()->put('quantity', $cart->quantity);
                    $request->session()->put('price', $cart->price);
                    
                    $isSaved = $cart->save();
                    if ($isSaved){
                    $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
                    
                    return response()->json(['message' => 'Product cart added' ,'numOfProductsCart'=>$numOfProductsCart]);
                }
            } 
            else {

                
                return response()->json(['message' => 'The product is already in the cart'] , Response::HTTP_BAD_REQUEST,);
        }
    }
        else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        
        }
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
        // dd(11);
        $validator = Validator($request->all(), [
            'quantity' => 'required|integer|min:1',
           
        ]);

        if (!$validator->fails()) {
        
            $cart->quantity = $request->quantity;

            $isSaved = $cart->save();
            // $request->session()->forget('code');
			// $request->session()->forget('type');
            return response()->json(
                ['message' => $isSaved ? 'quantity Updated successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        } 
    }

    public function applyCoupon(Request $request, Cart $cart)
    {
        $validator = Validator($request->all(), [
            'code' => 'nullable',
            Rule::exists('coupons')->where(function ($query) {
                $query->where('expire_date', '>', Carbon::now());
            }),
           
        ]);

        if (!$validator->fails()) {
            if ($cart->applyCoupon($request->code)) {
                $cart->coupon_code = $request->code;

                return response()->json(
                    ['message' => 'Coupon Applied!'],
                    Response::HTTP_CREATED,
                );
            }
            else{
                return response()->json(
                    ['message' => 'Coupon doesnt Applied!'],
                    Response::HTTP_BAD_REQUEST,
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        } 
        
       
        // return redirect()->back()->with('error_message', 'Invalid coupon code.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Cart $cart)
    {
        $product = $cart->product;
        if (!is_null($product)) {
    $deleted = $request->user()->productscart()->detach($product);
    $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
    return response()->json(
        [
            'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
            'text' => $deleted ? 'Category deleted successfully' : 'Category deleting failed!',
            'icon' => $deleted ? 'success' : 'error',
            'numOfProductsCart'=>$numOfProductsCart
        ],
        $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
    
    );  
}}
}
