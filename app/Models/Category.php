<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Category extends Model
{
    use HasFactory,Translatable;
    protected $translatedAttributes=['name'];

    public function getActiveStatusAttribute()
    {
        if (getLocal() =='en')
        return $this->status ? 'Available' : 'Disabled';
        elseif (getLocal() =='ar')
        return $this->status ? 'متاح' : 'غير متاح';
}
}