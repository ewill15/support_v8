<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            'password_resets',
            'migrations',            
            'users',
            'score_games',
            'icountries',
            'iusers',
            'ifruits',
            'ifoods',
            'icolors',
        ];
        
        Schema::disableForeignKeyConstraints();
        
        $this->truncateTables($tables);
        // $this->dropTables($tables);        
        
        Artisan::call('migrate:fresh');

        $seeders = [
            UserSeeder::class,
        ];
        $this->call($seeders);

        Schema::enableForeignKeyConstraints();
    }

    public function truncateTables(array $tables)
    {    
        foreach ($tables as $table)
        {
            if(Schema::hasTable($table))
                DB::table($table)->truncate();
        }        
    }

    public function dropTables(array $tables)
    {
        foreach ($tables as $table) 
        {
            if(Schema::hasTable($table))
                Schema::dropIfExists($table);
        }
    }
}
