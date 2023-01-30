<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = [ 'customer_name'];

    public function user(){
        return $this->belongsto(User::class ,'user_id','id');
    }
    public function products(){
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }
    public function getStatusTextAttribute(){
        if ($this->status=='Waitting'){
            return __('cp.waitting');
        }else if ($this->status=='Processing'){
            return __('cp.under_preparing');
        }else if ($this->status=='Delivered'){
            return __('cp.completed');
        }else{
            return __('cp.error');
        }
    }
    public function getStatusBadgeAttribute(){
        if ($this->status=='Waitting'){
            return 'primary';
        }else if ($this->status=='Processing'){
            return  'info';
        }else if ($this->status=='Delivered'){
            return 'success';
        }else{
            return 'danger';
        }
    }

    // public function scopeFilter($query)
    // {
    //     if (request()->has('status')) {
    //         if (request()->get('status') != null)
    //             $query->where('status',  request()->get('status'));
    //     }
    //     if (request()->has('id')) {
    //         if (request()->get('id') != null)
    //             $query->where('id',  request()->get('id'));
    //     }
    //     if (request()->has('payment_method')) {
    //         if (request()->get('payment_method') != null)
    //             $query->where('payment_method',  request()->get('payment_method'));
    //     }

    //     if (request()->has('customer_name')) {
    //         if (request()->get('customer_name') != null)
    //             $query->where(function($q)
    //             {$q->where('customer_name', 'like', '%'. request()->get('customer_name').'%');
    //             });
    //     }
    //     if (request()->has('customer_mobile')) {
    //         if (request()->get('customer_mobile') != null)
    //             $query->where(function($q)
    //             {$q->where('customer_mobile', 'like', '%'. request()->get('customer_mobile').'%');
    //             });
    //     }
    //     if (request()->has('customer_email')) {
    //         if (request()->get('customer_email') != null)
    //             $query->where(function($q)
    //             {$q->where('customer_email', 'like', '%'. request()->get('customer_email').'%');
    //             });
    //     }

    //     if (request()->has('providerIds')) {
    //         if (request()->get('providerIds') != null &&count(request()->get('providerIds')) > 0)
    //             $query->whereIn('provider_id',  request()->get('providerIds'));
    //     }

    //     if (request()->has('from')) {
    //         if (request()->get('from') != null)
    //             $query->where('created_at' ,'>=',  request()->get('from'));
    //     }

    //     if (request()->has('to')) {
    //         if (request()->get('to') != null)
    //             $query->where('created_at' ,'<=',  request()->get('to'));
    //     }


    // }

}
