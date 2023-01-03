<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'email' => 'infon@gmail.com',
            'name' => 'info',
        
            
            'message' => 'Message',
            
        ]);
    }
}
