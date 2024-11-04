<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Pasanaku;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class next_event extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasanaku:next_event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new event for pasanaku';

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
        $current_week = date("W");
        
        $pasanakus = Pasanaku::where('status',true)->get();

        foreach ($pasanakus as $key => $pasanaku) {
            if($current_week >= $pasanaku->week_start_date && $current_week <= $pasanaku->week_end_date){
                if(!Event::where('pasanaku_id',$pasanaku->id)->first()){
                    Event::create([
                        'pasanaku_id'=>$pasanaku->id,
                        'start_date'=>$pasanaku->date_start,
                        'end_date'=>$pasanaku->date_end,
                    ]);
                }else{
                    Log::info("-------event exists for pasanaco :: ".$pasanaku->name);
                }
            }
        }
    }
}
