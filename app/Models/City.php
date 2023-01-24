<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  use HasFactory,Translatable;
  protected $translatedAttributes=['name'];
      public function address(){
        return $this->hasmany(Address::class,'city_id','id');
    }
    public function areas(){
      return $this->hasmany(Area::class,'city_id','id');
  }
}
