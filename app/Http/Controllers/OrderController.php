<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\City;
use App\Models\FavoritProduct;
use App\Models\Language;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Token;
use App\Models\User;
use App\Traits\imageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    use imageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth('user')->check()){
       
            $orders=Order::where('user_id' ,'=' ,$request->user()->id)->get();
            $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
            $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
            return response()->view('front.order',['orders'=>$orders,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart]);

        }
        elseif(auth('admin')->check()){
            $orders=Order::all();
            return response()->view('admin.orders.home',['orders'=>$orders]);

        }
      
    }
    public function changeStatus($id, $status)
    {
        $item = Order::where('id', $id)->first();
        if ($item->status != 'Delivered') {
            $item->status = $status;
            $item->save();

            // if ($item->status == 'Waitting') {
                return redirect()->back();
            // } else {

            //     $message_en = '';
            //     $message_ar = '';
            //     if ($item->status == 'Processing') {
            //         $message_en = 'You order is Being Prepared';
            //         $message_ar = 'طلبك قيد التحضير';
            //     }elseif ($item->status == 'Delivered') {
            //         $message_en = 'Your order has been picked up';
            //         $message_ar = 'تم تسليم طلبك';
            //     } else {
            //         $message_en = 'Sorry! Your order has been cancelled, please contact our customer service.';
            //         $message_ar = 'نأسف ! تم الغاء طلبك , يرجى التواصل مع خدمة العملاء';
            //     }
            //     $locales = Language::all()->pluck('lang');
            //     $usersIDs = User::query()->where('notifications', '1')->where('id', $item->user_id)->pluck('id')->toArray();
                // $notify = new Notification();

                // $notify->translateOrNew('en')->title = 'Order #' . $item->id;
                // $notify->translateOrNew('ar')->title = $item->id . 'طلب #';
                // $notify->translateOrNew('en')->message = $message_en;
                // $notify->translateOrNew('ar')->message = $message_ar;
                // $notify->target_id = $item->id;
                // $notify->user_id = $item->user_id;
                // $notify->fcm_token = $item->fcm_token;
                // $notify->type = '2';
                // $notify->save();

                // $tokens_en = Token::where('lang', 'en')->whereIn('user_id', $usersIDs)->orWhere('fcm_token', $item->fcm_token)->pluck('fcm_token')->toArray();
                // $tokens_ar = Token::where('lang', 'ar')->whereIn('user_id', $usersIDs)->orWhere('fcm_token', $item->fcm_token)->pluck('fcm_token')->toArray();
                // sendNotificationToUsers($tokens_en, '2', $item->id, 'Order #' . $item->id, $message_en);
                // sendNotificationToUsers($tokens_ar, '2', $item->id, $item->id . 'طلب #', $message_ar);

                // activity($item->id)->causedBy(auth('admin')->user())->log('تعديل في حالة الطلب ');

            // }
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if(auth('user')->check()){
            
        $addresses=Address::with(['city','area'])->where('user_id' , $request->user()->id)->get();
        $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
        $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
        $cities=City::all();
        $total=Cart::where('user_id' ,'=' ,$request->user()->id)->sum(DB::raw('quantity * price'));

        return response()->view('front.checkout',['numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart,'addresses'=>$addresses,'cities'=>$cities,'total'=>$total]);
        }
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
                    $order_product->total = $cartproduct->quantity * $cartproduct->price;
                    // $order_product->total =  $order->total;
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
