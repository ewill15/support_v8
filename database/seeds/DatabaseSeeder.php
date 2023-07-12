<?php

use Illuminate\Database\Seeder;

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
        $truncateTables = [
            'questions','sections','registers'
        ];
        
        Schema::disableForeignKeyConstraints();
        
        $this->truncateTables($truncateTables);
        $this->dropTables($tables);        
        
        Artisan::call('migrate:fresh');

        $this->call(UsersSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(AccountsSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(SongsSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(RegisterSeeder::class);

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
