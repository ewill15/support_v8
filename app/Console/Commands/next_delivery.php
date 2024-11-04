<?php
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Round;
use App\Models\Legend;
use App\Models\Pasanaku;
use App\Models\FeePasanaku;
use App\Models\UserPasanaku;
use App\Models\Round_Pasanaku;
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
        $user_pasanakus_list = UserPasanaku::with('pasanaku','user')->get();
        $pasanakus = Pasanaku::where('status',true)->get();
        $current_day = \Carbon\Carbon::now();

        // Log::info("Pasanakus::".$pasanakus);
        // Log::info("DAY::".date('N'));
        foreach ($pasanakus as $index => $usr_pas) {
                $delivery_tmp = \Carbon\Carbon::parse($usr_pas->date_start);
                
                $usr_psnk = UserPasanaku::where('pasanaku_id',$usr_pas->id)->get();
                $week_user = \Carbon\Carbon::now()->format("Y-m-d");
                foreach ($usr_psnk as $key => $uspsn) {
                    switch (date('N')) {
                        case '6': // saturday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(5);
                            break;
                        case '5': // friday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(6);
                            break;
                        case '4': //thursday
                            $week_user = \Carbon\Carbon::parse($usr_pas->date_next);
                            break;                            
                        case '3': // wednesday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(1);
                            break;
                        case '2': // tuesday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(2);
                            break;
                        case '1': // monday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(3);
                            break;
                        
                        default:// sunday
                            $week_user = \Carbon\Carbon::parse($uspsn->date_start)->addDays(4);
                            break;
                    }

                    $week_user = $week_user->format("Y-m-d");  //set date to delivery
                    $usr_psnk_turn = UserPasanaku::where('pasanaku_id',$usr_pas->id)
                        ->where('delivery_date',$week_user)
                        ->first();
                    //Log::info("PASANAKU_ID::".$usr_pas->id." DELIVERY_DATE::".$week_user);
                    break;
                }
                $next_delivery = $week_user;
                // Log::info("WEEK_USER___::".$week_user);
                // Log::info("PASANAK_ID___::".$usr_pas->id);
                $delivery_user = UserPasanaku::with('pasanaku','user')
                    ->where('pasanaku_id',$usr_pas->id)
                    ->whereDate('delivery_date',$week_user)
                    //->toSql();
                    ->first();
                $delivery_user_tmp = UserPasanaku::with('pasanaku','user')
                    ->where('pasanaku_id',$usr_pas->id)
                    ->whereDate('delivery_date',$week_user)
                    ->count();

                $legend = Legend::where('name','LIKE','Turno%')->first();
                // Log::info("next-delivery-DATE___::".$next_delivery);
                // Log::info("legend_Turno::".$legend);
                Log::info("delivery USER___::".$delivery_user);

                if($delivery_user){
                    $user_fee_register = FeePasanaku::where('pasanaku_id',$delivery_user->pasanaku_id)
                    ->where('user_id',$delivery_user->user_id)
                    ->where('round',($usr_psnk_turn->turn))
                    ->count();
                    $total_user = UserPasanaku::where('pasanaku_id',$delivery_user->pasanaku_id)
                        ->where('user_id',$delivery_user->user_id)
                        ->count();
                    // add fee_pasanaku by user
                    Log::info("user fee register::".FeePasanaku::where('pasanaku_id',$delivery_user->pasanaku_id)
                    ->where('user_id',$delivery_user->user_id)
                    ->where('round',($usr_psnk_turn->turn))->toSql()." < total user::".$total_user);
                    if($user_fee_register<$total_user){
                        $counter = 0;
                        // add pasanaco turn to  fee_pasanaku table
                        while ($counter < $total_user) {
                            Log::info("COUNTER::".$counter);
                            $tmp = FeePasanaku::create([
                                'pasanaku_id' => $delivery_user->pasanaku_id,
                                'user_id' => $delivery_user->user_id,
                                'type' => $legend->id,
                                'round' => $delivery_user->turn
                            ]);
                            // execute only if its run onfriday
                            if(date('N') == 5){
                                $tmp['created_at'] = Carbon::parse($tmp->created_at)->addDay();
                                $tmp['updated_at'] = Carbon::parse($tmp->updated_at)->addDay();
                                $tmp->save();
                            }

                            $counter++;
                        }                    
                    }

                    // add record to round table
                    $round_check = Round::where('date',$delivery_user->delivery_date);
                    if(!$round_check){
                        $round = Round::create([
                            'date'=>$delivery_user->delivery_date,
                            'order'=>$delivery_user->turn
                        ]);
                        // add record to round_pasanaku table
                        $round_psk = Round_Pasanaku::where('pasanaku_id',$delivery_user->pasanaku_id)
                            ->where('round_id',$round->id)
                            ->first();
                        Log::info("ROUND_PSK::".(boolean)$round_psk);
                        if(!$round_psk){
                            Round_Pasanaku::create([
                                'pasanaku_id'=>$delivery_user->pasanaku_id,
                                'round_id'=>$round->id
                            ]);
                        }
                    }

                    //update next delivery date & status to pasanaku;
                    $pasanaku = Pasanaku::find($usr_pas->id);
                    $pasanaku->update(['date_next'=>$next_delivery]);
                    $result = [
                        'status'=> true,
                        'next_delivery' => $next_delivery
                    ];
                }else{
                    $result = [
                        'error' => "CHECK DELIVERY DATE"
                    ];
                }
        }
    }
}