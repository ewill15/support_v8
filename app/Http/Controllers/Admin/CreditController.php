<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\User;
use App\Models\Credit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    public function __construct()
    {
        view()->share('section','credits');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $credits = Credit::orderBy('created_at','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->search != '')
            $credits = $credits->where('reason','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($credits->count(), $page,$paginate,$lang);

        $credits = $credits->paginate($paginate);

        return view('admin.credits.index', compact('credits', 'paginate','text_pagination'));
    }

    public function create()
    {
        $users = User::orderBy('last_name', 'Asc')
        ->users()
        ->get()
        ->pluck('full_name', 'id');

        return view('admin.credits.create', compact('users'));
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'reason'=>'required',
            'total'=>'required',
            'init'=>'required',
            'monthly_fee'=>'required',
            'months_to_pay'=>'required'
        ]);

        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $credit = Credit::create($fields);

        if ($credit) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/credits');
    }

    public function edit($id)
    {
        $credit = Credit::find($id);
        $users = User::orderBy('last_name', 'Asc')
        ->users()
        ->get()
        ->pluck('full_name', 'id');

        return view('admin.credits.edit',compact('credit','users'));
    }

    public function update(Request $request, $id)
    {        
        $credit = Credit::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'reason'=>'required',
            'total'=>'required',
            'init'=>'required',
            'monthly_fee'=>'required',
            'months_to_pay'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $credit = $credit->update($fields);

        if ($credit) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }


        return redirect('admin/credits');
    }

    public function destroy($id)
    {
        $credit = Credit::findOrFail($id);
        if ($credit) {
            $credit->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/credits');
    }

    public function export() 
    {
        return Excel::download(new CreditExport, 'credits.xlsx');
    }
}
