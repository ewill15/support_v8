<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([            
            'name' => 'admin',
            'description'=>'administrative rights (create,read,update & delete)',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
        DB::table('roles')->insert([            
            'name' => 'user',
            'description'=>'user only can create,read & update',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
        DB::table('roles')->insert([            
            'name' => 'invited',
            'description'=>'only read',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
    }
}
