<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function city(){
        return $this->belongsto(City::class ,'city_id','id');
    }
    public function area(){
        return $this->belongsto(Area::class ,'area_id','id');
    }
}
