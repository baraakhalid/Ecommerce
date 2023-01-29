<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =['*'];

    public function applyCoupon($code)
    {

        $coupon = ProductCoupon::where('code', $code)->first();
        if (!$coupon || !$coupon->isValid()) {
            return false;
        }


        // $this->coupon_code = $coupon->code;
        // $this->discount = $coupon->discount;
        // $this->total = $this->total - $this->discount;
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

 
}
