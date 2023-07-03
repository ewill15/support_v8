<?php

namespace App\Http\Controllers\Admin;

use App\Models\Helper;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegistersController extends Controller
{
    public function __construct()
    {
        view()->share('section','register');
    }
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $registers = Register::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->keyword != '')
            $registers = $registers->where('page','LIKE','%'.$request->keyword.'%')
                ->orWhere('username','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($registers->count(), $page,$paginate,$lang);

        $registers = $registers->paginate($paginate);

        return view('admin.registers.index', compact('registers', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.registers.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'page' => 'required|string',
            'username' => 'required|string',
            'type' => 'required|string',
            'password' => 'required|string|min:6'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        if(isset($fields['password']) and strlen($fields['password'])>1 ){
            $fields['hash_password'] = bcrypt($fields['password']);
        }else{
            $fields['hash_password'] = null;
        }
        
        $register = Register::create($fields);

        if ($register)
        {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/registers');
    }

    public function edit($id)
    {
        $register = Register::find($id);

        return view('admin.registers.edit',compact('register'));
    }

    public function update(Request $request, $id)
    {
        $register = Register::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'page' => 'required|string',
            'username' => 'required|string',
            'type' => 'required|string',
            'password' => 'required|string|min:6'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }    
        
        $register = $register->update($fields);

        if ($register) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/registers');
    }

    public function destroy($id)
    {
        $register = User::findOrFail($id);

        if ($register) {
            $register->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/registers');
    }

    public function export() 
    {
        return Excel::download(new RegisterExport, 'registers.xlsx');
    }
}
