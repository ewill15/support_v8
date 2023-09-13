<?php

namespace App\Console\Commands;

use App\Models\Register;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class update_hash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'support:update_hash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update hash pasword';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $registers = Register::whereNull('hash_password')->get();
        
        foreach ($registers as $register) {
            $register['hash_password'] = bcrypt($register->password);
            $register->save();
        }
    }
}
