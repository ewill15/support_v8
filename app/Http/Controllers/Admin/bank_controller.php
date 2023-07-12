<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Exports\BankExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Bank;

class bank_controller extends Controller
{
    public function index(Request $request)
    {
        $banks = Bank::orderBy('name','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->keyword != '')
            $banks = $banks->where('name','LIKE','%'.$request->keyword.'%')
                ->orWhere('city','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($banks->count(), $page,$paginate);

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
            'name'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $bank = Bank::create($fields);

        if ($bank)
        {
            Session::flash('flash_message', 'Bank created successfully');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Bank could not be created');
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
            'name'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $bank->update($fields);

        Session::flash('flash_message', 'Bank updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/banks');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        if ($bank) {
            $bank->delete();

            Session::flash('flash_message', '¡Bank deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Bank could not be find.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/banks');
    }

    public function export() 
    {
        return Excel::download(new BankExport, 'banks.xlsx');
    }    
}
