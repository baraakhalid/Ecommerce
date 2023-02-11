<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExportForAdmin;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\City;
use App\Models\FavoritProduct;
use App\Models\Language;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductColorSize;
use App\Models\Token;
use App\Models\User;
use App\Traits\imageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
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
            $orders=Order::filter()->orderBy('id', 'desc')->get();
            return response()->view('admin.orders.home',['orders'=>$orders]);

        }
      
    }

    public function exportExcel(Request $request)
    {
        activity()->causedBy(auth('admin')->user())->log(' تصدير ملف إكسل لبيانات الطلبات ');
        return Excel::download(new OrdersExportForAdmin($request), 'orders.xlsx');
    }
    
    public function pdfOrders(Request $request)
    {
        activity()->causedBy(auth('admin')->user())->log(' تصدير ملف PDF لبيانات الطلبات ');
        $items = Order::orderByDesc('id')->get();
        $pdf = PDF::loadView('admin.orders.export_pdf', ['items' => $items]);
        return $pdf->download('orders.pdf');
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
          

            $cartproducts=Cart::where('user_id' ,'=' , $request->user()->id)->get();
            foreach($cartproducts as $cartproduct){
                // dd($cartproduct->size_id);

                $order_product = new OrderProduct();
                $product_id = $cartproduct->product_id;
                $color_id = $cartproduct->color_id;
                $size_id = $cartproduct->size_id;
                $quantity = $cartproduct->quantity;
                $productColorSize = ProductColorSize::where('product_id', $product_id)
                ->where('color_id', $color_id)
                ->where('size_id', $size_id)
                ->first();
                // dd($productColorSize->quantity);
              

                if($productColorSize && $productColorSize->quantity >= $quantity){
                    $productColorSize->quantity -= $quantity;
                    $productColorSize->save();
                    $order_product->order_id = $order->id;
                    $order_product->product_id = $cartproduct->product_id;
                    $order_product->quantity = $cartproduct->quantity;
                    $order_product->total = $cartproduct->quantity * $cartproduct->price;
                    // $order_product->total =  $order->total;
                    $isSaved = $order_product->save();

                }
                else {
                    return response()->json(
                        ['message' => 'Product quantity is not sufficient.'],
                        Response::HTTP_BAD_REQUEST,
                    );
                }
                 
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
