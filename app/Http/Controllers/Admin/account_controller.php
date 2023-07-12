<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Account;
use App\Bank;

class account_controller extends Controller
{
    public function index(Request $request)
    {
        $accounts = Account::with('bank')->orderBy('name','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->keyword != '')
            $accounts = $accounts->where('name','LIKE','%'.$request->keyword.'%')
                ->orWhere('last_name','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($accounts->count(), $page,$paginate);

        $accounts = $accounts->paginate($paginate);

        return view('admin.accounts.index', compact('accounts', 'paginate','text_pagination'));
    }

    public function create()
    {
        $banks = Bank::orderBy('name','asc')->pluck('name','id');

        return view('admin.accounts.create',compact('banks'));
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
        
        $account = Account::create($fields);

        if ($account)
        {
            Session::flash('flash_message', 'Account created successfully');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Account could not be created');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/accounts');
    }

    public function edit($id)
    {
        $account = Account::find($id);
        $banks = Bank::orderBy('name','asc')->pluck('name','id');

        return view('admin.accounts.edit',compact('account','banks'));
    }

    public function update(Request $request, $id)
    {        
        $account = Account::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $account->update($fields);

        Session::flash('flash_message', 'Account updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/accounts');
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        if ($account) {
            $account->delete();

            Session::flash('flash_message', '¡Account deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Account could not be find.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/accounts');
    }  
}
