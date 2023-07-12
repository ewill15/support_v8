<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\User;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::users()->orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $users = $users->where('first_name','LIKE','%'.$request->keyword.'%')
                ->orWhere('email','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($users->count(), $page,$paginate);

        $users = $users->paginate($paginate);

        return view('admin.users.index', compact('users', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'username' => 'required|string',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:6'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        if(isset($fields['password']) and strlen($fields['password'])>1 ){
            $fields['password'] = bcrypt($fields['password']);
        }else{
            $fields['password'] = null;
        }
        
        $user = User::create($fields);

        if ($user)
        {
            Session::flash('flash_message', 'Se ha creado un nuevo usuario');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear usuario');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/users');
    }

    public function edit($id)
    {
        $items = User::find($id);

        return view('admin.users.edit',compact('items'));
    }

    public function update(Request $request, $id)
    {        
        $items = User::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required',
            'email'=> 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $items->update($fields);

        Session::flash('flash_message', 'Se ha actualizado el usuario');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $items = User::findOrFail($id);
        if ($items) {
            $items->delete();

            Session::flash('flash_message', '¡Usuario Eliminado!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'usuario no pudo ser eliminado.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/users');
    }

    public function export() 
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
