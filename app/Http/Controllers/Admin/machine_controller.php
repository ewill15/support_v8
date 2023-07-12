<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class machine_controller extends Controller
{
    public function index(Request $request)
    {
        $machines = Machine::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $machines = $machines->where('motherboard','LIKE','%'.$request->keyword.'%')
            ->orWhere('processor','LIKE','%'.$request->keyword.'%')
            ->orWhere('mail_address','LIKE','%'.$request->keyword.'%')
            ->orWhere('office_package','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($machines->count(), $page,$paginate);

        $machines = $machines->paginate($paginate);

        return view('admin.machines.index', compact('machines', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.machines.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {        
        $v= Validator::make($request->all(),[
            'motherboard' => 'required',
            'processor' => 'required',
            'IP' => 'required',
            'operative_system' => 'required',
            'mail_address' => 'required|email',
            'office_package' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $machine = Machine::create($fields);

        if ($machine)
        {
            Session::flash('flash_message', 'New machine created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating machine');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/machines');
    }

    public function edit($id)
    {
        $machine = Machine::find($id);

        return view('admin.machines.edit',compact('machine'));
    }

    public function update(Request $request, $id)
    {        
        $machine = Machine::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'motherboard' => '',
            'processor' => '',
            'IP' => '',
            'operative_system' => '',
            'mail_address' => '',
            'office_package' => ''
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $machine->update($fields);

        Session::flash('flash_message', 'Machine updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/machines');
    }

    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        if ($machine) {
            $machine->delete();

            Session::flash('flash_message', '¡Machine deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Machine could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/machines');
    }
}
