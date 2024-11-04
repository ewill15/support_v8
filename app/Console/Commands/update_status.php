<?php

namespace App\Console\Commands;

use App\Models\Pasanaku;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        // $pasanakus = Pasanaku::get();

        foreach ($pasanakus as $pasanaku) {
            $pasanaku_tmp = \Carbon\Carbon::parse($pasanaku->date_end);
            $diff = $pasanaku_tmp->diffInDays($current_day);//->diffForHumans();
            Log::info("UPD_STATUS::".$diff);

            $diff_date = \Carbon\Carbon::parse(@$pasanaku->date_end)->diffInDays(\Carbon\Carbon::now());
            // Log::info("diff days:: ".$diff_date. "-pasnaku name: ".$pasanaku->name."-status:".$pasanaku->status);
            // Log::info("diffDate__ ".$diff_date>1);
            // Log::info("diff_ ".$diff > 0);
            // Log::info("JOIN OPERATIONS ".!($diff>0 && $diff_date>1));
            if(!($diff>0 && $diff_date>1)){
                // Log::info(" inside if*************************** ".$pasanaku->name);
                $pasanaku_tmp = Pasanaku::find($pasanaku->id);
                $pasanaku->update([
                    'status'=>false,
                    'date_next'=>$pasanaku->date_end
                ]);
            }
        }
    }
}
