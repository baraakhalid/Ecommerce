<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'user_id'=>'1',
            'name'=>'Gaza',
            'street'=>'Mashroo3',
            'building'=>'building',
            'area'=>'area',
            'flate_num'=>'flate21',
        ]
            
        );
    }
}
