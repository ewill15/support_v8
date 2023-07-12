<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Cancel;

class cancel_controller extends Controller
{
    public function index(Request $request)
    {
        $services = Cancel::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $services = $services->where('name','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($services->count(), $page,$paginate);

        $services = $services->paginate($paginate);

        return view('admin.services.index', compact('services', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'username' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $cancel = Cancel::create($fields);

        if ($cancel)
        {
            Session::flash('flash_message', 'Cancel service registered');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'cancel service does not created');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/cancel');
    }

    public function edit($id)
    {
        $company = Cancel::find($id);

        return view('admin.services.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {        
        $company = Cancel::find($id);
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
        $company->update($fields);

        Session::flash('flash_message', 'Cancel service updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/cancel');
    }

    public function destroy($id)
    {
        $items = Cancel::findOrFail($id);
        if ($items) {
            $items->delete();

            Session::flash('flash_message', '¡Cancel service deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Cancel service could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/cancel');
    }
}
