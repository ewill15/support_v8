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
        // \App\Models\User::factory(10)->create();
        $tables = [
            'password_resets',
            'migrations',            
            'users', 
            'roles',
            // 'bills',
            // 'companies',
            // 'banks',
            // 'accounts',
            // 'services',
            // 'songs'
        ];
        $truncateTables = [
            'questions','sections','registers'
        ];
        
        Schema::disableForeignKeyConstraints();
        
        $this->truncateTables($tables);
        // $this->dropTables($tables);        
        
        Artisan::call('migrate:fresh');

        $seeders = [
            UserSeeder::class,
            RoleSeeder::class,
            BillSeeder::class,
            CompaniesSeeder::class
        ];
        $this->call($seeders);
        // $this->call();
        // $this->call(BankSeeder::class);
        // $this->call(AccountsSeeder::class);
        // $this->call(ServicesSeeder::class);
        // $this->call(SongsSeeder::class);
        // $this->call(QuestionSeeder::class);
        // $this->call(RegisterSeeder::class);

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
