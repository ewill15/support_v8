<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\User;
use App\Mail\PasanakuMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        view()->share('section','users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $users = User::users()->orderBy('last_name', 'ASC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $users = $users->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('cellphone', 'LIKE', $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($users->count(), $page, $paginate, $lang);

        $users = $users->paginate($paginate);

        return view('admin.users.index', compact('users', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        return view('admin.users.create');
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
            'firs_name' => 'required|string|min:3',
            'last_name' => 'string',
            'email'=>'required|email',
            'password' => 'min:8',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        if($request->dob)
            $fields['dob'] = Helper::date_database($request->dob);

        $fields['password'] = bcrypt($request->password);
        $fields['username'] = $request->username?$request->username:explode(" ", $request->first_name)[0];
        // dd($fields);
        // OPTION 1::   
        // Mail::to()->send(new PasanakuMail($admin,$pasanaku));
        // OPTION 2:: 
        // Mail::send('emails.pasanaku', ['admin' => $admin->full_name, 'pasanaku' => $pasanaku], function ($m) use ($pasanaku) {
        //     $m->from('info@pasanaku.com', 'ukanasap');
        //     $m->to('ewarandia@gmail.com', $pasanaku->username)->subject('Nuevo Pasanaku creado');
        // });
        $user = User::create($fields);

        if ($user) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $guarantees = User::orderBy('last_name', 'Asc')
        ->users()
        ->get()
        ->pluck('full_name', 'id');

        return view('admin.users.edit', compact('user','guarantees'));
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
        $user = User::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3',
            'last_name' => 'string',
            'email'=>'required|email',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        if(isset($request->email))
            unset($fields['email']);

        if(!$request->username)
            $fields['username'] = explode(" ", $request->first_name)[0];

        $user = $user->update($fields);

        if ($user) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/users');
    }
}
