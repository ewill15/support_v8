<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BillSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BanksSeeder;
use Database\Seeders\SongsSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\AccountsSeeder;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\CompaniesSeeder;
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
            'migrations',
            'password_resets',
            'users', 
            'bills',
            'companies',
            'banks',
            'accounts',
            'services',
            'songs'
        ];
        
        Schema::disableForeignKeyConstraints();

        //$this->truncateTables($tables);
        $this->dropTables($tables);        
        
        Artisan::call('migrate:fresh');

        $this->call(UserSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(AccountsSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(SongsSeeder::class);

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
