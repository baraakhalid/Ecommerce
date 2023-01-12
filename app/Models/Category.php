<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Category extends Model
{
    use HasFactory,Translatable;
    protected $translatedAttributes=['name'];

    public function products(){
        return $this ->hasMany(Product::class ,'category_id','id' );
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


        if (request()->has('sort_by')) {
            if (request()->get('sort_by') == '1') { // A-Z
                $query->orderByRaw("(SELECT name FROM category_translations WHERE category_id = categories.id and  locale = '" . app()->getLocale() . "') ASC");
            }elseif (request()->get('sort_by') == '2'){ // Z-A
                $query->orderByRaw("(SELECT name FROM category_translations WHERE category_id = categories.id and  locale = '" . app()->getLocale() . "') DESC");
            }
        }





    }
}