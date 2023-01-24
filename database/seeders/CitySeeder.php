<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityTranslation;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
           
            'id' => '1',


        ]);  
          City::create([
           
            'id' => '2',


        ]);
        
        CityTranslation::create([
            'name' => 'Gaza',
            'locale' => 'en',
            'City_id' => '1',


        ]);
        CityTranslation::create([
            'name' => 'غزة',
            'locale' => 'ar',
            'City_id' => '1',


        ]); 
         CityTranslation::create([
            'name' => 'Rafah',
            'locale' => 'en',
            'City_id' => '2',


        ]);
        CityTranslation::create([
            'name' => 'رفح',
            'locale' => 'ar',
            'City_id' => '2',


        ]);
    }
}
