<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Quarentine;
use App\Exports\QuarentinesExport;
use Maatwebsite\Excel\Facades\Excel;

class quarentine_controller extends Controller
{
    public function index(Request $request)
    {
        $quarentines = Quarentine::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $quarentines = $quarentines->where('food','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($quarentines->count(), $page,$paginate);

        $quarentines = $quarentines->paginate($paginate);

        return view('admin.quarentines.index', compact('quarentines', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.quarentines.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'date' => 'required|string',
            'food' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $quarentine = Quarentine::create($fields);

        if ($quarentine)
        {
            Session::flash('flash_message', 'New register created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Register could not be registered');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/quarentines');
    }

    public function edit($id)
    {
        $quarentine = Quarentine::find($id);

        return view('admin.quarentines.edit',compact('quarentine'));
    }

    public function update(Request $request, $id)
    {        
        $quarentine = Quarentine::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'date' => 'required|string',
            'food' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $quarentine->update($fields);

        Session::flash('flash_message', 'Register updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/quarentines');
    }

    public function destroy($id)
    {
        $quarentine = Quarentine::findOrFail($id);
        if ($quarentine) {
            $quarentine->delete();

            Session::flash('flash_message', '¡Register deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Register could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/quarentines');
    }

    public function export() 
    {
        return Excel::download(new QuanrentinesExport, 'quarentines.xlsx');
    }
}
