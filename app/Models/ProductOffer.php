<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getOriginalPriceAttribute()
    {
        return $this->product->price;
    }

    public function getOfferPriceAttribute()
    {
        return $this->product->price - ($this->product->price * ($this->discount / 100));
    }
}
