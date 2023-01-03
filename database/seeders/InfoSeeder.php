<?php

namespace Database\Seeders;

use App\Models\Info;
use App\Models\InfoTranslation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::create([
            'email' => 'infon@gmail.com',
            'mobile' => '05912345789',
        
            'birthdate' => Carbon::create('1999', '15', '12'),
            // 'location' => 'lorem epsum',
            // 'nationality' => 'Palestinian',
            'languages' => '["Arabic","English"]',
            'experience' => '2',
            'freelance_active' => false,
            'facebook_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            'link' => 'https://www.facebook.com/',
            'twitter_url' => 'https://www.facebook.com/sawsan.s.ghabayen/',
            'image' => '',
            
        ]);
        InfoTranslation::create([
           
            'full_name' => 'Ala Fesifes',
            'location' => 'lorem epsum',
            'locale' => 'en',
            'info_id' => '1',
            'job' => 'Laravel PHP',
            'nationality' => 'Palestinian',
           
            
        ]);
        InfoTranslation::create([
           
            'full_name' => 'علاء فسيفس',
            'location' => 'صضثصثق',
            'locale' => 'ar',
            'info_id' => '1',
            'job' => 'لارافيل ',
            'nationality' => 'فلسطيني',

           
            
        ]);
    }
}
