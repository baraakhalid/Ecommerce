<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
           
            'background_img' => '',
            
        ]);
        SettingTranslation::create([
           
            'description_home' => 'qweqewe',
            'description_about' => 'wqeqeqwe',
            'description_portfolio' => 'lorem epsum',
            'description_contact' => 'werewwer',
            'setting_id' => '1',
            'locale' => 'en',
           
            
        ]);
        SettingTranslation::create([
           
            'description_home' => 'صضثضصث',
            'description_about' => 'ضصثضصثضصث',
            'description_portfolio' => 'صضثصثق',
            'description_contact' => 'ثقصثصث',
            'locale' => 'صثقصق',
            'setting_id' => '1',
           
            
        ]);
    }
}
