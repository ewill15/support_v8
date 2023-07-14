<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Bank;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function __construct()
    {
        view()->share('section','accounts');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $accounts = Account::with('bank')->orderBy('name','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->search != '')
            $accounts = $accounts->where('name','LIKE','%'.$request->search.'%')
                ->orWhere('last_name','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($accounts->count(), $page,$paginate,$lang);

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
            'name'=>'required',
            'number'=>'required',
            'bank_id'=>'required|exists:banks,id'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $account = Account::create($fields);

        if ($account) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
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
            'name'=>'required',
            'number'=>'required',
            'bank_id'=>'required|exists:banks,id'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $account = $account->update($fields);

        if ($account) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/accounts');
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);

        if ($account) {
            $account->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/accounts');
    }  
}
