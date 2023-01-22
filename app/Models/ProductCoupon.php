<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCoupon extends Model
{
    use HasFactory;
    protected $fillable=['*'];
    
    public function isValid()
    {
        return $this->expire_date > Carbon::now();
    }
}
