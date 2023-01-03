<?php

namespace App\Models;

// use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // public $translatedAttributes = ['title'];
    protected $hidden=['translations','updated_at','deleted_at'];
}
