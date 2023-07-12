<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        view()->share('section','services');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $request)
     {
        $lang = app()->getLocale();
        $services = Service::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $services = $services->where('name','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($services->count(), $page,$paginate,$lang);

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

        if ($user) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
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
 
        if ($user) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }
 
         return redirect('admin/services');
     }
 
     public function destroy($id)
     {
        $service = Service::findOrFail($id);

        if ($user) {
            $user->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/services');
     }
}
