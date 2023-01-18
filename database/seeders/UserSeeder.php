<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'username' => 'admin',
            'role_id' =>  1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([            
            'first_name' => 'Edwin',
            'last_name' => 'Arandia',            
            'email' => 'ewarandia@gmail.com',
            'password' => bcrypt('user'),
            'username' => 'user',
            'role_id' =>  2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([            
            'first_name' => 'invited',
            'last_name' => 'User',            
            'email' => 'invited@gmail.com',
            'password' => bcrypt('invited'),
            'username' => 'invited',
            'role_id' =>  3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
