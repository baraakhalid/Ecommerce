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
}