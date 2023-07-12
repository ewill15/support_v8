<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function __construct()
    {
        view()->share('section','banks');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $banks = Bank::orderBy('name','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->keyword != '')
            $banks = $banks->where('name','LIKE','%'.$request->keyword.'%')
                ->orWhere('city','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($banks->count(), $page,$paginate,$lang);

        $banks = $banks->paginate($paginate);

        return view('admin.banks.index', compact('banks', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'name'=>'required',
            'city'=>'required',
        ]);

        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $bank = Bank::create($fields);

        if ($bank) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/banks');
    }

    public function edit($id)
    {
        $bank = Bank::find($id);

        return view('admin.banks.edit',compact('bank'));
    }

    public function update(Request $request, $id)
    {        
        $bank = Bank::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name'=>'required',
            'city'=>'required',
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $bank = $bank->update($fields);

        if ($bank) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }


        return redirect('admin/banks');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        if ($bank) {
            $bank->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/banks');
    }

    public function export() 
    {
        return Excel::download(new BankExport, 'banks.xlsx');
    } 
}
