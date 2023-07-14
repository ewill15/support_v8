<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    public function __construct()
    {
        view()->share('section','bills');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $bills = Bill::with('company')->orderBy('date','DESC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;

        if($request->search != '')
            $bills = $bills->where('invoice_number','LIKE','%'.$request->search.'%')
                ->orWhere('description','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($bills->count(), $page,$paginate, $lang);

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
        $fields['user_id'] = Auth::id();

        $bill = Bill::create($fields);

        if ($bill) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/bills');
    }

    public function edit($id)
    {
        $bill = Bill::find($id);
        $bill->date = Carbon::parse($bill->date)->format('d-m-Y');
        $companies = Company::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.bills.edit',compact('bill','companies'));
    }

    public function update(Request $request, $id)
    {        
        $bill = Bill::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'company_id'=>'required|exists:companies,id',
        ]);

        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $bill = $bill->update($fields);

        if ($bill) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/bills');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);

        if ($bill) {
            $bill->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/bills');
    }

    public function export() 
    {
        return Excel::download(new BillsExport, 'bills.xlsx');
    }
}
