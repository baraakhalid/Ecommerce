<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaTranslation;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
           
            'id' => '1',
            'city_id'=>'1',


        ]);  
          Area::create([
           
            'id' => '2',
            'city_id'=>'1',



        ]);
        
        AreaTranslation::create([
            'name' => 'Alremal',
            'locale' => 'en',
            'area_id' => '1',


        ]);
        AreaTranslation::create([
            'name' => 'الرمال',
            'locale' => 'ar',
            'area_id' => '1',


        ]); 
         AreaTranslation::create([
            'name' => 'Tel al-Hawa',
            'locale' => 'en',
            'area_id' => '2',


        ]);
        AreaTranslation::create([
            'name' => 'تل الهوا',
            'locale' => 'ar',
            'Area_id' => '2',


        ]);
    }
}
