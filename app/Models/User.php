<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory;
    protected $fillable=['*'];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
    public function productscart()
    {
        return $this->belongsToMany(Product::class, Cart::class, 'user_id','product_id');
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');

    }

   public function favorites()
    {
        return $this->hasMany(FavoritProduct::class ,'user_id','id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, FavoritProduct::class,'user_id','product_id');
    }
    public function wishlistHas($productId)
    {
        return self::products()->where('product_id', $productId)->exists();
    }
}
