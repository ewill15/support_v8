<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'Edwin Willy',
            'last_name' => 'Arandia Zeballos',
            'mobile' => '763-22029',
            'number' => '1-147-20143',
            'bank_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Edwin Willy',
            'last_name' => 'Arandia Zeballos',
            'mobile' => '763-22029',
            'number' => '421759-401-0',
            'bank_id' => '7',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);        
        DB::table('accounts')->insert([
            'name' => 'Edwin Willy',
            'last_name' => 'Arandia Zeballos',
            'mobile' => '763-22029',
            'number' => '706-2-1-07480-4',
            'bank_id' => '11',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Lucy Elizabeth',
            'last_name' => 'Romero Ortega',
            'mobile' => '728-83356',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Shirley Nidya',
            'last_name' => 'Arandia Zeballos',
            'mobile' => '760-59166',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Nancy Lilian',
            'last_name' => 'Arandia Zeballos',
            'mobile' => '785-70863',
            'number' => '1-104-28402',
            'bank_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);    
        DB::table('accounts')->insert([
            'name' => 'Lucy Elizabeth',
            'last_name' => 'Romero Ortega',
            'mobile' => '728-83356',
            'number' => '1-104-7053',
            'bank_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Sandra Aleida',
            'last_name' => 'Romero Ortega',
            'mobile' => '728-82971',
            'number' => '1-408-5151',
            'bank_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('accounts')->insert([
            'name' => 'Lucia',
            'last_name' => 'Ortega',
            'mobile' => '71174624',
            'number' => '1-252-95606',
            'bank_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
