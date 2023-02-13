<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;
    public function size(){
        return $this->belongsto(Size::class ,'size_id','id');
    }
    public function color(){
        return $this->belongsto(Color::class ,'color_id','id');
    }
}
