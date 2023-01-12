<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Subadmin;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class HomeController extends Controller
{

    public function index()
    {
        $admins_count =Admin::count();
        // $vendors_count =Subadmin::count();
        // $sales_from_all_vendors_in_this_day = Order::whereDate('created_at', Carbon::today())->where('status','4')->sum('total');
        // $orders_from_all_vendors_in_this_day = Order::whereDate('created_at', Carbon::today())->count();
        // $avg_from_all_vendors = round(Order::where('status','!=','5')->average('total'),2);
        // $total_sales_from_all_vendors = Order::where('status','!=','5')->sum('total');
        // $total_orders_from_all_vendors = Order::count();
        // $confirmed_orders = Order::where('status','1')->count();
        // $under_preparing_orders = Order::where('status','2')->count();
        // $ready_to_pick_orders = Order::where('status','3')->count();
        // $completed_orders = Order::where('status','4')->count();
        // $canceled_orders = Order::where('status','5')->count();


        return view('admin.home.dashboard')->with(compact('admins_count'));
    }


    public function changeStatus($model, Request $request)
    {
        $role = "";
        if ($model == "admins") $role = 'App\Models\Admin';
        if ($model == "categories") $role = 'App\Models\Category';
        if ($model == "products") $role = 'App\Models\Product';
        if ($model == "product_offers") $role = 'App\Models\ProductOffer';
        if ($model == "product_coupons") $role = 'App\Models\ProductCoupon';
        if ($model == "option_values") $role = 'App\Models\OptionValue';
        if ($model == "promo_codes") $role = 'App\Models\PromoCode';
        if ($model == "orders") $role = 'App\Models\Order';
        if ($model == "cuisines") $role = 'App\Models\Cuisine';
        if ($model == "banners") $role = 'App\Models\Banner';
        if ($model == "contacts") $role = 'App\Models\Contact';
        if ($model == "providers") $role = 'App\Models\Subadmin';
        if ($model == "users") $role = 'App\Models\User';
        if ($model == "logs") $role = 'App\Models\Activity';
        if ($model == "roles") $role = 'App\Models\Role';

        if ($role != "") {
            if ($request->action == 'delete') {
                $role::query()->whereIn('id', $request->IDsArray)->delete();
            } else {
                if ($request->action) {
                    $role::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->action]);
                }
            }

            return $request->action;
        }
        return false;


    }


}
