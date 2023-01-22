<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Product extends Model
{
    use HasFactory,Translatable;
    protected $translatedAttributes=['name','info'];
    protected $appends = ['image_url'];

    public function images()
    {
        return $this->morphMany(Image::class, 'object', 'object_type', 'object_id', 'id');
    }
    
    public function getImageUrlAttribute()
    {
        return url('uploads/images/' . $this->images()->first()->url);
    }
    public function getMainImageAttribute()
    {
        // return $this->images()->first()->url;
        return  url('uploads/images/' . $this->images()->first()->url);


    }
    public function getImageAttribute($image)
    {
        return !is_null($image) ? url('uploads/images/products/' . $image) : url('uploads/images/products/d.jpg');
    }

    public function category(){
        return $this->belongsto(Category::class ,'category_id','id');
    }
 
     public function offers()
    {
        return $this->hasMany(ProductOffer::class, 'product_id', 'id');
    }
    //  public function colors()
    // {
    //     return $this->hasMany(ProductColorSize::class, 'product_id', 'id');
    // }
    //  public function sizes()
    // {
    //     return $this->hasMany(ProductColorSize::class, 'product_id', 'id');
    // }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, ProductColorSize::class,'product_id','size_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, ProductColorSize::class,'product_id','color_id');
    }



    public function getOfferPriceAttribute()
    {
        if ($this->offers()->count() > 0) {
            return $this->offers()->first()->offer_price;
        }
        return null;
    }


    public function scopeFilter($query)
    {
      

        if (request()->has('name')) {
            if (request()->get('name') != null)
                $query->whereTranslationLike('name','%' . request()->get('name') . '%');
        }

        if (request()->has('status')) {
            if (request()->get('status') != null)
                $query->where('status', request()->get('status'));
        }

        if (request()->has('category_id')) {
            if (request()->get('category_id') != null)
                $query->where('category_id', request()->get('category_id'));
        }
      
    

        if (request()->has('sort_by')) {
            if (request()->get('sort_by') == '1') { // A-Z
                $query->orderByRaw("(SELECT name FROM product_translations WHERE product_id = products.id and  locale = '" . app()->getLocale() . "') ASC");
            }elseif (request()->get('sort_by') == '2'){ // Z-A
                $query->orderByRaw("(SELECT name FROM product_translations WHERE product_id = products.id and  locale = '" . app()->getLocale() . "') DESC");
            }
        }





    }
}
