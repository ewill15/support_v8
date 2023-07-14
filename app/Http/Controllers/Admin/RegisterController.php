<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        view()->share('section','webs');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $registers = Register::orderBy('status','DESC')->orderBy('type', 'ASC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $registers = $registers->where('username', 'LIKE', '%' . $request->search . '%')
                ->orWhere('page', 'LIKE', $request->search . '%')
                ->orWhere('type', 'LIKE', $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($registers->count(), $page, $paginate, $lang);
        
        $registers = $registers->paginate($paginate);
        
        return view('admin.registers.index', compact('registers', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        return view('admin.registers.create');
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
            'type'=>'required',
            'page'=>'required',
            'username'=>'required',
            'password'=>'required|min:8',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $fields['hash_password'] = bcrypt($request->password);
        $fields['date'] = Carbon::now();        
        
        $register = Register::create($fields);

        if ($register) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/webs');
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
        $register = Register::find($id);

        return view('admin.registers.edit', compact('register'));
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
        $register = Register::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'type'=>'required',
            'page'=>'required',
            'username'=>'required',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        if(isset($request->password))
            $fields['hash_password'] = bcrypt($request->password);
                
        $register = $register->update($fields);

        if ($register) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/webs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $register = Register::findOrFail($id);

        if ($register) {
            $register->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/webs');
    }

    public function hashPassword($id)
    {
        $register = Register::find($id);

        $register['hash_password'] = bcrypt($register->password);
        $action = $register->save();

        if ($action) {
            $result = [
                "msg" => Helper::contentFlashMessage('update')['success'],
                "status" => true
            ];
        } else {
            $result = [
                "msg" => Helper::contentFlashMessage('update')['error'],
                "status" => false
            ];
        }

        return response()->json($result);
    }

    public function displayData($id)
    {
        $register = Register::find($id);

        $result = $register;

        return view('admin.registers.data', compact('result'));
    }
}
