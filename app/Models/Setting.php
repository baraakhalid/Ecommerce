<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   use Translatable;
   public $translatedAttributes = ['description_home','description_contact','description_portfolio','description_contact'];
    public $guarded = [];
//    protected $appends = ['privacy','terms','aboutus'];
    protected $hidden=['translations','updated_at','deleted_at'];

    public function getImageAttribute($value)
    {
        return url('uploads/images/settings/' . $value);
    }
    

}
