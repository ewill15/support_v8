<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\Rule;
use App\Models\User;
use App\Models\Event;
use App\Models\Legend;
use App\Models\Penalty;
use App\Models\Pasanaku;
use App\Models\UserEvent;
use App\Mail\PasanakuMail;
use App\Models\FeePasanaku;
use App\Models\Notification;
use App\Models\UserPasanaku;
use Illuminate\Http\Request;
use App\Models\Round_Pasanaku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PasanakusController extends Controller
{
    public function __construct()
    {
        view()->share('section', 'pasanakus');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $pasanakus = Pasanaku::orderBy('id', 'ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int) $request->page;
        if ($request->keyword != '') {
            $pasanakus = $pasanakus
                ->whereDate('date_start', 'LIKE', $request->keyword)
                ->orWhere('date_end', 'LIKE', $request->keyword);
        }

        $text_pagination = Helper::messageCounterPagination(
            $pasanakus->count(),
            $page,
            $paginate,
            $lang
        );

        $pasanakus = $pasanakus->paginate($paginate);
        
        if(date("N") == 1){
            Artisan::call('pasanaku:next_delivery');
            Artisan::call('pasanaku:update_status');
        }
        return view(
            'admin.pasanakus.index',
            compact('pasanakus', 'paginate', 'text_pagination')
        );
    }

    public function create()
    {
        return view('admin.pasanakus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'date_start' => 'required|date|date_format:d-m-Y',
            'participant_total' => 'required|integer',
            'amount_total' => '',
            'name' => '',
            'description' => '',
        ]);
        if ($v && $v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }

        $fields = $request->all();
        $tmp_next = $request->date_start;
        $tmp_end = $request->date_start;
        $tmp_participant =  $fields['participant_total']-1;

        if ($fields['round'] == 'semanal') {
            // $fields['date_next'] = Helper::date_next_database($tmp_next);
            $fields['date_end'] = Helper::date_end_database(
                $tmp_end,
                $tmp_participant
            );
            $fields['date_start'] = Helper::date_database($request->date_start);
        } else {
            // $fields['date_next'] = Helper::date_next_database($tmp_next, false);
            $fields['date_end'] = Helper::date_end_database(
                $tmp_end,
                $tmp_participant,
                false
            );
            $fields['date_start'] = Helper::date_database($request->date_start);
        }

        $fields['date_next']=$fields['date_start'];
        $fields['name'] = $request->name ? $request->name.'-'.date('Y') : Helper::getPasanakuName($fields['date_start']);
        $fields['amount_total'] = $request->amount_total? $request->amount_total : 100;
        $fields['status']=true;
        
        $pasanaku = Pasanaku::create($fields);
        #update current pasanaku year_end field
        $pasanaku_tmp["year_end"] = date('Y',strtotime($pasanaku->date_end));
        $pasanaku->update($pasanaku_tmp);
        /**
         * update old year_end field
         */
        $psk_tmp = Pasanaku::where('year_end','0')->get();
        foreach ($psk_tmp as $pasanaku_tmp) {
            $tmp['year_end'] = date("Y",strtotime($pasanaku_tmp->date_end));
            $pasanaku_tmp->update($tmp);
        }
        $admin = Auth::user();        
       
        if ($pasanaku) {
             // Mail::to()->send(new PasanakuMail($admin,$pasanaku));
            Mail::send('emails.pasanaku', ['admin' => $admin->full_name, 'pasanaku' => $pasanaku], function ($m) use ($admin) {
                $m->from('info@pasanaku.com', 'ukanasap');
                $m->to('ewarandia@gmail.com', $admin->role)->subject('Nuevo Pasanaku creado');
            });

            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['success']
            );
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['error']
            );
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/pasanakus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userPasanaku = $id;

        $details = UserPasanaku::with('user','pasanaku')
        ->where('pasanaku_id',$userPasanaku)
        ->orderBy("delivery_date")
        ->get();

        if(!$details->isEmpty()){
            $participant_list = [];

            $date_next =$details[0]->pasanaku->date_next;

            if ($details[0]->pasanaku){            
                $pasanaku = [
                    "name"=>$details[0]->pasanaku->name,
                    "round"=>$details[0]->pasanaku->round,
                    "start_date"=>$details[0]->pasanaku->date_start,
                    "deliver_date"=>$details[0]->pasanaku->date_next,
                    "participants_nro"=>$details[0]->pasanaku->participant_total
                ];
                $delivery_tmp = \Carbon\Carbon::parse($date_next);
                // dd($details[0]);
                $search_date = false;
               
                foreach ($details as $key=>$detail) {
                    if(!$search_date){
                        $delivery_user = \Carbon\Carbon::parse($detail->delivery_date);
                        $diff = $delivery_tmp->diffInDays($delivery_user);
    
                        if($diff<7){
                            $pasanaku["deliver_name"] = $detail->user->full_name;
                            $search_date = true;
                        }
                    }

                    $index = $key+1;
                    $usr_list = "<p>$index.-".$detail->user->fullname."</p>";
                    
                    array_push($participant_list,$usr_list);
                }
                $pasanaku["participants_list"] = join(" ",$participant_list);
            }

            return view('admin.userpasanakus.info', compact('pasanaku'));
        }else{
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasanaku = Pasanaku::find($id);
        $pasanaku->date_start = Carbon::parse()->format('d-m-Y');

        return view('admin.pasanakus.edit', compact('pasanaku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasanaku = Pasanaku::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'date_start' => 'required|date|date_format:d-m-Y',
            'participant_total' => 'required|integer',
            'amount_total' => '',
            'description' => '',
        ]);
        if ($v && $v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }

        $current_day = Carbon::now();
        $diff_in_days = $request->date_end?$fields['date_end']->diffInDays($current_day):Carbon::parse($pasanaku->date_end)->diffInDays($current_day);
        if($diff_in_days == 0)
            $fields['status'] = false;
        $fields['date_start'] = Carbon::parse($request->date_start)->format('Y-m-d');
        $fields['date_end'] = Helper::date_end_database(
            Carbon::parse($fields['date_start'])->format('d-m-Y'),
            $fields['participant_total']-1,
            false
        );
        if(!$request->name) $fields['name'] = Helper::getYearGestion();

        $admin = Auth::user();  
        $old_participant = $pasanaku->participant_total;

        if ($pasanaku->update($fields)) {
            $qty_new = $pasanaku->participant_total - $old_participant;
            if($qty_new) {
                Mail::send('emails.pasanaku_participant', 
                    ['admin' => $admin->full_name, 'pasanaku' => $pasanaku, 'qty_new'=>$qty_new, 'qty_old'=>$old_participant], 
                    function ($m) use ($pasanaku) {
                        $m->from('info@pasanaku.com', 'ukanasap SYSTEM');
                        $m->to('ewarandia@gmail.com', $pasanaku->username)->subject('Cantidad Participantes modificada');
                });
            }
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('update')['success']
            );
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('update')['error']
            );
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/pasanakus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pasanaku = Pasanaku::findOrFail($id);

        if ($pasanaku) {            
            UserPasanaku::where('pasanaku_id',$id)->delete();//relationship
            Event::where('pasanaku_id',$id)->delete();//relationship
            Round_Pasanaku::where('pasanaku_id',$id)->delete();//relationship
            FeePasanaku::where('pasanaku_id',$id)->delete();//relationship
            Rule::where('pasanaku_id',$id)->delete();//relationship
            Penalty::where('pasanaku_id',$id)->delete();//relationship
            Notification::where('pasanaku_id',$id)->delete();//relationship
            UserEvent::where('pasanaku_id',$id)->delete();//relationship
            $pasanaku->delete(); //delete phisically
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('delete')['success']
            );
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('delete')['error']
            );
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/pasanakus');
    }

    public function penalty($id)
    {
        $penalty_pas = Penalty::with('pasanaku')
        ->where('pasanaku_id',$id)
        ->get();

        // dd($penalty_pas[0]->pasanaku,$penalty_pas[1]->pasanaku);

        return view(
            'admin.pasanakus.penalty',
            compact('penalty_pas')
        );
    }
    public function form_add_participant($id)
    {
        $pasanaku = Pasanaku::find($id);
        $users = User::orderBy('last_name', 'Asc')
        ->users()
        ->get()
        ->pluck('full_name', 'id');

        $total_user_pas = UserPasanaku::where('pasanaku_id',$id)->get();        
        $user_registered = $pasanaku->participant_total - $total_user_pas->count();
        $user_id_next_registered_tmp = UserPasanaku::where('pasanaku_id',$id)->orderBy('id','desc')->first();
        $user_id_next_registered = $user_id_next_registered_tmp ? $user_id_next_registered_tmp->turn : 0;
        // dd($user_id_next_registered_tmp);
        /*dd('registered:: '.$total_user_pas->count(),
         'total:: '. $pasanaku->participant_total, 
         'user register remain::'.$user_registered,
         !$user_registered);*/
        if($user_registered){
            // dd('registered:'.$user_id_next_registered_tmp,'pasanaku::'.$pasanaku,'users::'.$users,'user_registered::'.$user_registered,'user_id_next_registered::'.$user_id_next_registered);
            $option = view('admin.pasanakus.add_participant',compact('pasanaku','users','user_registered','user_id_next_registered'));
        }else{
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['custom_error']
            );
            Session::flash('flash_message_type', 'danger');
            $option = redirect('admin/pasanakus');
        }

        return $option;
    }

    /**
     * add new participant & calculate the delivery date .
     * select distinct(up.user_id),u.first_name from users u inner join user_pasanakus up on u.id=up.user_id where up.pasanaku_id=2
     * @param  int  $id pasanaku id
     * @return \Illuminate\Http\Response
     */
    public function add_participant(Request $request,$id)
    {
        $fields = $request->all();
        $pasanaku = Pasanaku::find($id);
        $counter = 0;#$pasanaku->participant_total;
        $registered = UserPasanaku::totalParticipants($id)->get()->count();
        
        $delivery_tmp = Carbon::createFromFormat('Y-m-d', $pasanaku->date_start);
        $total_user_pas = UserPasanaku::where('pasanaku_id',$id)->get();
        $user_registered = $pasanaku->participant_total - $total_user_pas->count();
        while ($counter < $user_registered) {
            $created_upas=UserPasanaku::create([
                'pasanaku_id'=>$id,
                'user_id'=>$fields['user_id'][$counter],
                'turn'=>$fields['turn'][$counter],
                'delivery_date' => Helper::date_next_delivery($pasanaku->date_start,$fields['turn'][$counter]-1),
                'week_number'=>Helper::week_next_delivery($pasanaku->date_start,$fields['turn'][$counter]-1)
            ]);
            
            $counter++;
        }
        
        Session::flash(
            'flash_message',
            Helper::contentFlashMessage('create')['success']
        );
        Session::flash('flash_message_type', 'success');

        return redirect('admin/pasanakus');
    }

    public function form_add_legend($id)
    {
        $pasanaku = Pasanaku::find($id);
        $users = User::orderBy('last_name', 'Asc')
        ->users()
        ->get()
        ->pluck('full_name', 'id');
        $user_pas = UserPasanaku::where('pasanaku_id',$id)->first();
        $total_user_pas = UserPasanaku::totalParticipants($id)->count();
        
        $remaining = $pasanaku->participant_total - $total_user_pas;
        // dd($pasanaku,$users,$user_pas,'total_uP='.$total_user_pas,'remaining='.$remaining);
        return view('admin.pasanakus.add_participant',compact('pasanaku','users','user_pas','remaining'));
    }

    /**
     * add new participant & calculate the delivery date .
     *
     * @param  int  $id pasanaku id
     * @return \Illuminate\Http\Response
     */
    public function add_legend(Request $request,$id)
    {
        $fields = $request->all();
        $fields['pasanaku_id'] = $id;
        $pasanaku = Pasanaku::find($id);
        $tmp_delivery_date = Carbon::parse($pasanaku->date_start);
        $fields['delivery_date'] = $tmp_delivery_date->addWeeks($fields['turn']);
        $created_upas=UserPasanaku::create($fields);

        if($created_upas){
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['success']
            );
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['error']
            );
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/pasanakus');
    }

    public function pasanaku_delivery_dates($id){
        $usrpasanaku = UserPasanaku::with(['user','pasanaku'])->where('pasanaku_id',$id)->get();

        $pasanaku = $usrpasanaku[0]->pasanaku;

        $datas = [];        
        foreach ($usrpasanaku as $usrpas)
        {            
            $datas['participant'][] = isset($usrpas->user->full_name)?$usrpas->user->full_name:'';
            $datas['delivery'][] = Carbon::parse($pasanaku->date_start)->addWeeks(($usrpas->turn-1))->format('d-M-Y');
        }

        return view('admin.pasanakus.finished',compact('datas'));
    }

    /** form fee pasanaco */
    public function frm_fee_pasanaco($id){

        $pasanaku = Pasanaku::find($id);
        
        $participants = UserPasanaku::with('user')
            ->where('pasanaku_id',$id)
            ->get(); 
        
        if(!$participants->count()){
            Session::flash(
                'flash_message',
                'No participant registered'
            );
            Session::flash('flash_message_type', 'danger');

            return redirect("admin/pasanakus");
        }

        $participant = UserPasanaku::with('user')
            ->nextDelivery($id,$pasanaku->date_next)->first();
        
        $from = Carbon::parse($pasanaku->date_next)
            ->addDays(-5)
            ->format('Y-m-d');
        $to = Carbon::parse($pasanaku->date_next)
            ->addDay()
            ->format('Y-m-d');
        // dd($from,$to);
        $fee_registered = FeePasanaku::with(['user','pasanaku','typeLegend'])
            ->where('pasanaku_id',$id)
            ->whereDate('created_at', '>=',$from)
            ->whereDate('created_at', '<=',$to)
            ->get();
        // dd($fee_registered,$from,$to);
        $total_registered = 0;
        $total_registered_tmp = FeePasanaku::where('pasanaku_id',$id)
            ->select(DB::raw('count(user_id) as registered'))
            ->whereDate('created_at', '>=',$from)
            ->whereDate('created_at', '<=',$to)
            ->where('round',$participant->turn)
            ->groupBy('user_id')
            ->get();
            
        foreach ($total_registered_tmp as $key => $register) {
            $total_registered += $register->registered;
        }
        
        $type_list = Legend::orderBy('name')->pluck('name','id');
        $types = Legend::orderBy('name')->get();
        $participant_list = [];
        foreach ($participants as $key => $user) {
            array_push($participant_list,$user->user->id);
        }
        
        $participant_color = [];
        $usr_list = [];
        foreach ($participants as $key => $user) {
            $usr_list[$user->user->id] = $user->user->full_name;
            // array_push($usr_list,[
            //     $user->user->id => $user->user->full_name
            // ]);
            
            $user_fee_registered = FeePasanaku::with(['typeLegend'])
            ->where('pasanaku_id',$id)
            ->where('user_id',$user->user->id)
            ->whereDate('created_at', '>=',$from)//'>=','2023-12-15')
            ->whereDate('created_at', '<=',$to)//'<=','2023-12-28')            
            ->first();
            
            // if($user->user->id == 2)
            //     dd(FeePasanaku::with(['typeLegend'])
            //     ->where('pasanaku_id',$id)
            //     ->where('user_id',$user->user->id)
            //     ->whereDate('created_at', '>=',$from)
            //     ->whereDate('created_at', '<=',$to)
            //     ->toSql()
            //     ,$id,$user->user->id,$from,$to,$user_fee_registered?'REGISTERED':'NOT REGISTERED');
            if($user_fee_registered){
                array_push($participant_color,[$user->id=>$user_fee_registered->typeLegend->color]);
            }else{
                array_push($participant_color,[$user->id=>-1]);
            }
        }
        
        //  dd($user_fee_registered,$usr_list,$participant_color,$usr_list,$from,$to,'user_id::'.$participants[0]->user,'id::'.$id);
        return view('admin.pasanakus.fee_pasanaku', compact(
            'pasanaku',
            'usr_list',
            'type_list',
            'participant',
            'fee_registered',
            'total_registered',
            'participants',
            'participant_color',
            'types'
        ));
    }

    /**
     * register fee passanaco  by user
     * select u.first_name, fp.id, fp.type,fp.round from users u inner join fee_pasanakus fp on fp.user_id=u.id where fp.round=19;
     */
    public function fee_pasanaco(Request $request,$id){
        
        $fields = $request->all();        
        $v = Validator::make($request->all(), [
            'pasanaku_id' => 'required|exists:pasanakus,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|exists:legends,id',
        ]);
        if ($v && $v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }

        $user_counter = UserPasanaku::where('pasanaku_id',$request->pasanaku_id)
            ->where('user_id',$request->user_id)
            ->count();

        $counter_tmp = 1;
        // check fee pasanaku for round to avoid duplicity
        $search_record = FeePasanaku::where('pasanaku_id',$request->pasanaku_id)
            ->where('user_id',$request->user_id)
            ->where('round',$request->round)
            ->first();
        // dd($request->all(),$search_record);
        if(!$search_record){
            if ($user_counter >1){            
                while(true){
                    $user_fp = FeePasanaku::create($fields); //create record
                    /** set created_at updated_at to  friday if day is saturday or sunday */
                    if(date('N') == 6) //is saturday decrease one day
                    {
                        $upd_user_fp["created_at"] = Helper::decrease_date_database($user_fp["created_at"]);
                        $upd_user_fp["updated_at"] = Helper::decrease_date_database($user_fp["updated_at"]);
                        
                        $user_fp->update($upd_user_fp);            
                    }
                    if(date('N') == 7) //is sunday decrease two day
                    {
                        $upd_user_fp["created_at"] = Helper::decrease_date_database($user_fp["created_at"],2);
                        $upd_user_fp["updated_at"] = Helper::decrease_date_database($user_fp["updated_at"],2);
                        
                        $user_fp->update($upd_user_fp);            
                    }
    
                    if($counter_tmp == $user_counter){
                        break;
                    }                
                    $counter_tmp++;
                }
            }else{
                $user_fp = FeePasanaku::create($fields);//create user
                if(date('N') == 6) //is saturday  decrease one day
                {
                    $upd_user_fp["created_at"] = Helper::decrease_date_database($user_fp["created_at"]);
                    $upd_user_fp["updated_at"] = Helper::decrease_date_database($user_fp["updated_at"]);
                    
                    $user_fp->update($upd_user_fp);            
                }
                if(date('N') == 7) //is sunday decrease two day
                {
                    $upd_user_fp["created_at"] = Helper::decrease_date_database($user_fp["created_at"],2);
                    $upd_user_fp["updated_at"] = Helper::decrease_date_database($user_fp["updated_at"],2);
                    
                    $user_fp->update($upd_user_fp);            
                }
            }
            $text_tmp = ($counter_tmp > 1) ? "s" : "";
            $text_msg = Helper::contentFlashMessage('create')['success'];
            $text = $text_msg . "---Participante:".$user_fp->user->full_name . " participando con ". $counter_tmp ." número".$text_tmp;
            $type = "success";
        }else{
            $user = User::find($request->user_id);
            $text = "Participante: $user->full_name registrado";
            $type = "danger";
        }
        
        
        Session::flash(
            'flash_message',
            $text
        );
        Session::flash('flash_message_type', $type);
            
        
        return redirect()->back();//->with('success', 'Fee registered!!!'); 
    }

    public function view_fee_pasanaco($id) {
        $fee_pas = FeePasanaku::with(['user','typeLegend','pasanaku'])
            ->where('pasanaku_id',$id)
            ->orderBy('round','DESC')
            ->orderBy('created_at','DESC')
            ->get();

        return view('admin.pasanakus.view_fees', compact('fee_pas'));
    }

    public function check_fee_pasanaco(Request $request,$pasanaku,$user,$round){
        $result = ['status'=>false];

        $fee_pas = FeePasanaku::where('pasanaku_id',$pasanaku)
        ->where('user_id', $user)
        ->where('round', $round)
        ->first();
        
        if($fee_pas){            
            $result = ['status'=>true];
        }

        return response()->json($result);
    }

    /** form final event */
    public function frm_final_event($id){

        $pasanaku = Pasanaku::find($id);
        $event = Event::where('pasanaku_id',$id)->first();
        if (!$event)
            Artisan::call('pasanaku:next_event');
        $participants = UserPasanaku::with('user')
            // ->distinct('user_id')
            ->where('pasanaku_id',$id)
            ->get(); 
        // $participants = $participants->unique('user_id');
        if(!$participants->count()){
            Session::flash(
                'flash_message',
                'No participant registered'
            );
            Session::flash('flash_message_type', 'danger');
            
            return redirect("admin/pasanakus");
        }

        $usr_list = [];
        $participant_icon = [];
        foreach ($participants as $key => $user) {
            $usr_list[$user->user->id] = $user->user->full_name;

            $user_event = UserEvent::with(['pasanaku','user'])
            ->where('pasanaku_id',$id)
            ->where('user_id',$user->user->id)
            ->first();
            
            if($user_event){
                array_push($participant_icon,true);
            }else{
                array_push($participant_icon,false);
            }
        }
        
        return view('admin.pasanakus.events.event_pasanaku',compact('pasanaku','participants','usr_list','event','participant_icon'));
    }

    public function final_event(Request $request,$id){
        $fields = $request->all();
        $v = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($v && $v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }
        
        $finder = UserEvent::where('pasanaku_id',$request->pasanaku_id)
            ->where('user_id',$request->user_id)
            ->first();
        
        if(!$finder){
            $fields['pasanaku_id'] = $id;
            UserEvent::create($fields);        
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['success']
            );
            Session::flash('flash_message_type', 'success');
            
        }else{
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['error']
            );
            Session::flash('flash_message_type', 'danger');
        }   

        return redirect()->back();//->with('success', 'Fee registered!!!'); 
    }

    /**
     * register fee forward  by user
     * select u.first_name, fp.id, fp.type,fp.round from users u inner join fee_pasanakus fp on fp.user_id=u.id where fp.round=19;
     */
    public function fee_forward(Request $request,$id){
        
        $fields = $request->all();        
        $v = Validator::make($request->all(), [
            'pasanaku_id' => 'required|exists:pasanakus,id',
            'user_id' => 'required|exists:users,id',
            'counter' => 'required',
            //'round'=>'required'
        ]);
        if ($v && $v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }
        
        // getting id for adelanto legend
        $legend = Legend::where('name','LIKE','adela%')->first(); 

        // search if participant is registered
        $finder = FeePasanaku::where('pasanaku_id',$request->pasanaku_id)
            ->where('user_id',$request->user_id)
            ->where('round',$request->round)
            ->count();

        //getting datas for user
        $date_fw = UserPasanaku::with('pasanaku')
        ->where('pasanaku_id',$request->pasanaku_id)
        ->where('turn',$request->round)
        ->first();

        $pasanaku_info = Pasanaku::find($request->pasanaku_id);

        $date1 = Carbon::createFromFormat('Y-m-d', $pasanaku_info->date_next);
        
        $date2 = Carbon::createFromFormat('Y-m-d', $date_fw->delivery_date);

        if($date1->eq($date2)){
            $fields['round']++;    
        }
        
        if(!$finder){
            $fields['type'] = $legend->id;
            $counter_save = 1;
            $array_ids = [];
            $fee_pas = FeePasanaku::create($fields);
            $fields['round']++;
            $counter_save++;
            while ($counter_save <= $request->counter) {
                $fee_pas = FeePasanaku::create($fields);
                array_push($array_ids,$fee_pas->id);
                $fields['round']++;
                $counter_save++;
            }
            
            $date_new_tmp = Carbon::parse($date_fw->pasanaku->date_start);
            $upd_round = $request->round;
            foreach($array_ids as $key=>$id){
                $date_new = $date_fw = UserPasanaku::with('pasanaku')
                ->where('pasanaku_id',$request->pasanaku_id)
                ->where('turn',$upd_round)
                ->first();
                //update created date to each fee
                DB::statement("UPDATE fee_pasanakus SET created_at = '$date_new->delivery_date', updated_at='$date_new->delivery_date' where id=$id");
                $upd_round++;
            }
            Session::flash(
                'flash_message',
                Helper::contentFlashMessage('create')['success']
            );
            Session::flash('flash_message_type', 'success');
            
        }else{
            $fields['type'] = $legend->id;
            $counter_save = 1;
            $array_ids = [];
            $fee_pas = FeePasanaku::create($fields);
            $fields['round']++;
            $counter_save++;
            while ($counter_save <= $request->counter) {
                $fee_pas = FeePasanaku::create($fields);
                array_push($array_ids,$fee_pas->id);
                $fields['round']++;
                $counter_save++;
            }
            $date_upd = Carbon::parse($pasanaku_info->date_next)->addWeek()->format('Y-m-d');
            DB::statement("UPDATE fee_pasanakus SET created_at = '$date_upd', updated_at='$date_upd' where id=$id");
            $date_new_tmp = Carbon::parse($date_fw->pasanaku->date_start);
            $upd_round = $request->round;
            foreach($array_ids as $key=>$id){
                $date_new = $date_fw = UserPasanaku::with('pasanaku')
                ->where('pasanaku_id',$request->pasanaku_id)
                ->where('turn',$upd_round)
                ->first();
                //update created date to each fee
                DB::statement("UPDATE fee_pasanakus SET created_at = '$date_new->delivery_date', updated_at='$date_new->delivery_date' where id=$id");
                $upd_round++;
            }
            Session::flash(
                'flash_message',
                'Participant with pasanaku turn. register next round'
            );
            Session::flash('flash_message_type', 'danger');
        }   

        return redirect()->back();//->with('success', 'Fee registered!!!'); 
    }
}
