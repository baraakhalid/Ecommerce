<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory;

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
