<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use DateTime;
use App\Helper;
use App\Machine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class task_controller extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $tasks = $tasks->where('description','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($tasks->count(), $page,$paginate);

        $tasks = $tasks->paginate($paginate);

        return view('admin.tasks.index', compact('tasks', 'paginate','text_pagination'));
    }

    public function create()
    {
        $machine_list = Machine::orderBy('id','desc')->pluck('owner','id');

        return view('admin.tasks.create',compact('machine_list'));
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'date' => 'required',
            'description' => 'required',
            'price' => 'required',
            'machine_id' => 'required|exists:machines,id'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        if (isset($request->date)) {
            $fields['date'] = Carbon::createFromFormat('d-m-Y', $request->date)->toDateString();            
            $date = new DateTime(Carbon::parse($request->date));
            $fields['number_week'] = $date->format("W");
        }else{
            $fields['date'] = null;
            $fields['number_week'] = null;
        }

        $task = Task::create($fields);

        if ($task)
        {
            Session::flash('flash_message', 'New task created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating task');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $machine_list = Machine::orderBy('id','desc')->pluck('owner','id');

        return view('admin.tasks.edit',compact('task','machine_list'));
    }

    public function update(Request $request, $id)
    {        
        $task = Task::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'date' => '',
            'description' => '',
            'price' => '',
            'number_week' => '',
            'machine_id' => ''
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $task->update($fields);

        Session::flash('flash_message', 'Task updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/tasks');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $task->delete();

            Session::flash('flash_message', '¡task deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'task could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/tasks');
    }
}
