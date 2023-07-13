<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MachineController extends Controller
{
    public function __construct()
    {
        view()->share('section','machines');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $machines = Machine::orderBy('ip', 'ASC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->keyword != '')
            $machines = $machines->where('owner', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('processor', 'LIKE', $request->keyword . '%');

        $text_pagination = Helper::messageCounterPagination($machines->count(), $page, $paginate, $lang);

        $machines = $machines->paginate($paginate);

        return view('admin.machines.index', compact('machines', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        return view('admin.machines.create');
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
            'motherboard' => 'required|string|min:3',
            'processor' => 'required',            
            'ip' => 'required|ipv4',
            'operative_system'=>'required',
            'mail_address' => 'min:8',
            'office_package'=>'required',
            'owner'=>'required'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $machine = Machine::create($fields);

        if ($machine) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/machines');
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
        $machine = Machine::find($id);

        return view('admin.machines.edit', compact('machine'));
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
        $machine = Machine::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'motherboard' => 'required|string|min:3',
            'processor' => 'required',            
            'ip' => 'required|ipv4',
            'operative_system'=>'required',
            'mail_address' => 'min:8',
            'office_package'=>'required',
            'owner'=>'required'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
                
        $machine = $machine->update($fields);

        if ($machine) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $machine = Machine::findOrFail($id);

        if ($machine) {
            $machine->delete(); //delete phisically   

            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/machines');
    }
}
