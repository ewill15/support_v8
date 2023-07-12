<?php

namespace App\Console\Commands;

use App\Models\Pasanaku;
use Illuminate\Console\Command;

class update_status extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasanaku:update_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set status pasanaku to inactive';

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
        $current_day = \Carbon\Carbon::now();
        $pasanakus = Pasanaku::where('status',true)->get();

        foreach ($pasanakus as $pasanaku) {
            $pasanaku_tmp = \Carbon\Carbon::parse($pasanaku->date_end);
            $diff = $pasanaku_tmp->diffInDays($current_day);

            if($diff >= 0 && $diff<4){
                $pasanaku_tmp = Pasanaku::find($pasanaku->id);
                $pasanaku_tmp->update(['status'=>0]);
            }
        }
    }
}
