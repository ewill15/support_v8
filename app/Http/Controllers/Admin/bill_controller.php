<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Bill;
use App\Company;
use App\Exports\BillsExport;
use Maatwebsite\Excel\Facades\Excel;

class bill_controller extends Controller
{
    public function index(Request $request)
    {
        $bills = Bill::with('company')->orderBy('date','DESC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->keyword != '')
            $bills = $bills->where('invoice_number','LIKE','%'.$request->keyword.'%')
                ->orWhere('description','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($bills->count(), $page,$paginate);

        $bills = $bills->paginate($paginate);

        return view('admin.bills.index', compact('bills', 'paginate','text_pagination'));
    }

    public function create()
    {
        $companies = Company::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.bills.create',compact('companies'));
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'invoice_number'=>'required',
            'control_code'=>'required',
            'date'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'company_id'=>'required|exists:companies,id',
            'user_id'=>'required|exists:users,id'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $bill = Bill::create($fields);

        if ($bill)
        {
            Session::flash('flash_message', 'Bill created successfully');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Bill could not be created');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/bills');
    }

    public function edit($id)
    {
        $bill = Bill::find($id);
        $companies = Company::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.bills.edit',compact('bill','companies'));
    }

    public function update(Request $request, $id)
    {        
        $bill = Bill::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'invoice_number'=>'required',
            'control_code'=>'required',
            'date'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'company_id'=>'required|exists:companies,id',
            'user_id'=>'required|exists:users,id'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $bill->update($fields);

        Session::flash('flash_message', 'Bill updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/bills');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        if ($bill) {
            $bill->delete();

            Session::flash('flash_message', '¡Bill deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Bill could not be find.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/bills');
    }

    public function export() 
    {
        return Excel::download(new BillsExport, 'bills.xlsx');
    }
}
