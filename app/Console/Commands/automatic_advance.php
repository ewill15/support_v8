<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Pasanaku;
use App\Models\FeePasanaku;
use App\Models\UserPasanaku;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class automatic_advance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pasanaku:automatic_advance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'avance automático de pasanaku';

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
        Log::info("-----------------------------AUTOMATIC ADVANCE-----------------------------");
        $pasanakus = Pasanaku::where('automatic', true)
            ->where('status', true)
            ->get();
        Log::info($pasanakus);

        $week_current = Carbon::now()->weekOfYear;
        foreach ($pasanakus as $pasanaku) {
            $participant_total = $pasanaku->participant_total;
            $user_ids = UserPasanaku::where("pasanaku_id",$pasanaku->id)->get();
            // Log::info($user_ids);
            #check if exists pasanaku
            if(FeePasanaku::where("pasanaku_id",$pasanaku->id)->first()){
                Log::info("LAST ROUND");
                $db_week = Carbon::parse($pasanaku->date_next)->weekOfYear;
                Log::info("****************DB vs CURRENT  WEEK*************");
                Log::info(($db_week ."==". $week_current));
                Log::info("************************************************");
                if($db_week == $week_current){
                    #set last round
                    $next_round = FeePasanaku::where("pasanaku_id",$pasanaku->id)->max("round")+1;
                    Log::info("***************NEXT ROUND***********************");
                    Log::info($next_round);
                    Log::info("************************************************");
                    for ($turn = 1; $turn <= $participant_total; $turn++){
                        FeePasanaku::create([
                            "pasanaku_id"=>$pasanaku->id,
                            "user_id"=>$user_ids->user_id,
                            "type"=>2,
                            "round"=>$next_round
                        ]);
                    }
                }                
            }else{
                #fill data from begining round
                Log::info("FILLING DATA");
                // Log::info("WEEK_TMP::".gettype($week_tmp));
                // Log::info("PARTICIPANT TOTAL::".gettype($participant_total));
                // Log::info("PASANAKU::".gettype($pasanaku));
                // Log::info("USR_ID::".gettype($user_ids));
                // Log::info($user_ids);
                $turn = 1;
                $delivery_date = UserPasanaku::where("pasanaku_id",$pasanaku->id)->where('turn',$turn)->first()->delivery_date;
                Log::info("*******DELIVERY DATE *******");
                Log::info($delivery_date);
                
                $week_tmp = Carbon::parse($delivery_date)->weekOfYear;
                while($week_tmp < $week_current){
                    foreach ($user_ids as $key => $user_id) {
                        FeePasanaku::create([
                            "pasanaku_id"=>$pasanaku->id,
                            "user_id"=>$user_id->user_id,
                            "type"=>2,
                            "round"=>$turn
                        ]);
                    }
                    Log::info($week_tmp."<=".$week_current);
                    $turn++;
                    $_tmp = UserPasanaku::where("pasanaku_id",$pasanaku->id)->where('turn',$turn)->first()->delivery_date;
                    $week_tmp = Carbon::parse($_tmp)->weekOfYear;
                    Log::info("*****TURN******");
                    Log::info($turn);
                    Log::info("***********");    
                    
                }
            }
        }
    }
}
