<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Product extends Model
{
    use HasFactory,Translatable;
    protected $translatedAttributes=['name','info'];
    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->images()->first()->url);
    }
    public function getMainImageAttribute()
    {
        return $this->images()->first()->url;

    }


    public function category(){
        return $this->belongsto(Category::class ,'category_id','id');
    }
 
     public function offers()
    {
        return $this->hasMany(ProductOffer::class, 'product_id', 'id');
    }


    public function getOfferPriceAttribute()
    {
        if ($this->offers()->count() > 0) {
            return $this->offers()->first()->offer_price;
        }
        return null;
    }
}
