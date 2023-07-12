<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Service;

class service_controller extends Controller
{
    public function index(Request $request)
    {
        $services = Service::orderBy('id','ASC');

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
            'name' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $service = Service::create($fields);

        if ($service)
        {
            Session::flash('flash_message', 'New service created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating service');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/services');
    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin.services.edit',compact('service'));
    }

    public function update(Request $request, $id)
    {        
        $service = Service::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $service->update($fields);

        Session::flash('flash_message', 'Service updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/services');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service) {
            $service->delete();

            Session::flash('flash_message', '¡Service deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Service could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/services');
    }
}
