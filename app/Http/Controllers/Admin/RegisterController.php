<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Register;
use Illuminate\Http\Request;
use App\Exports\RegisterExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registers = Register::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $registers = $registers->where('username','LIKE','%'.$request->keyword.'%')
                ->orWhere('type','LIKE','%'.$request->keyword.'%')
                ->orWhere('page','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($registers->count(), $page,$paginate);

        $registers = $registers->paginate($paginate);

        return view('admin.registers.index', compact('registers', 'paginate','text_pagination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $v= Validator::make($request->all(),[
            'username' => 'required',
            'type' => 'required',
            'password' => 'required|min:8',
            'date' => 'date',
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        $fields['user_id']= Auth::id();
        $fields['hash_password'] = bcrypt($fields['password']);
        
        $register = Register::create($fields);

        if ($register)
        {
            Session::flash('flash_message', 'Cuenta gregada');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear la cuenta');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/registers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        $items = Register::find($register->id);

        return view('admin.registers.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        $items = Register::find($request->id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'username' => 'required',
            'type' => 'required',
            'password' => 'required|min:8',
            'date' => 'date',
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $items->update($fields);

        Session::flash('flash_message', 'Se ha actualizado la cuenta');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/registers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        $items = Register::findOrFail($register->id);
        if ($items) {
            $items->delete();

            Session::flash('flash_message', '¡Cuenta Eliminada!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'cuenta no pudo ser eliminada.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/registers');
    }

    public function export() 
    {
        return Excel::download(new RegisterExport, 'registers.xlsx');
    }
}
