<?php

namespace Database\Seeders;

use App\Models\ColorTranslation;
use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
           
            'id' => '1',


        ]);  
          Color::create([
           
            'id' => '2',


        ]);
        
        ColorTranslation::create([
            'name' => 'red',
            'locale' => 'en',
            'color_id' => '1',


        ]);
        ColorTranslation::create([
            'name' => 'احمر',
            'locale' => 'ar',
            'color_id' => '1',


        ]); 
         ColorTranslation::create([
            'name' => 'black',
            'locale' => 'en',
            'color_id' => '2',


        ]);
        ColorTranslation::create([
            'name' => 'اسود',
            'locale' => 'ar',
            'color_id' => '2',


        ]);
    }
}
