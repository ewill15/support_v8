<?php

namespace App\Console\Commands;

use App\Models\Pasanaku;
use App\Models\UserPasanaku;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class next_delivery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasanaku:next_delivery';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate next delivery for  each pasanaku';

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
        $user_pasanakus_list = UserPasanaku::with('pasanaku')->get();
        
        $current_day = \Carbon\Carbon::now();
        
        foreach ($user_pasanakus_list as $index => $usr_pas) {            
            $delivery_tmp = \Carbon\Carbon::parse($usr_pas->pasanaku->date_start);
            $next_delivery = $delivery_tmp->addWeeks($usr_pas->turn);
            $diff = $delivery_tmp->diffInDays($current_day);
            
            if($diff<7){
                Log::info($usr_pas->turn);
                Log::info("dif:".$diff);
                Log::info("NEXT::".$usr_pas);
                Log::info("DATE__".$next_delivery);
                $pasanaku = Pasanaku::find($usr_pas->pasanaku->id);
                $pasanaku->update(['date_next'=>$next_delivery]);
                $result = [
                    'status'=> true,
                    'next_delivery' => $next_delivery
                ];
            }
        }
    }
}
