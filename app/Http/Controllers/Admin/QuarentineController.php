<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\Quarentine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuarentineController extends Controller
{
    public function __construct()
    {
        view()->share('section','quarentines');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $quarentines = Quarentine::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $quarentines = $quarentines->where('food','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($quarentines->count(), $page,$paginate,$lang);

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
        $fields['date'] = Carbon::parse($request->date)->format('Y-m-d');
        
        $quarentine = Quarentine::create($fields);
        
        if ($quarentine) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/quarentines');
    }

    public function edit($id)
    {
        $quarentine = Quarentine::find($id);
        $quarentine->date = Carbon::parse($quarentine->date)->format('d-m-Y');

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
        
        $fields['date'] = Carbon::parse($request->date)->format('Y-m-d');

        $quarentine = $quarentine->update($fields);

        if ($quarentine) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/quarentines');
    }
 
    public function destroy($id)
    {
    $quarentine = Quarentine::findOrFail($id);
    if ($quarentine) {
        $quarentine->delete(); //delete phisically   
        Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
        Session::flash('flash_message_type', 'success');
    } else {
        Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
        Session::flash('flash_message_type', 'danger');
    }
    
    return redirect('admin/quarentines');
    }

    public function export() 
    {
    return Excel::download(new QuanrentinesExport, 'quarentines.xlsx');
    }
}
