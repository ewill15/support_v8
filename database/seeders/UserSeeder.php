<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([            
            'first_name' => 'admin',
            'last_name' => 'last admin',            
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'username' => 'admin',
            'user_role' =>  'admin',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
        ]);
        DB::table('users')->insert([            
            'first_name' => 'user',
            'last_name' => 'last user',            
            'email' => 'ewarandia@gmail.com',
            'password' => bcrypt('admin123'),
            'username' => 'user',
            'user_role' =>  'user',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
        ]);
    }
}
