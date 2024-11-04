<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        view()->share('section','companies');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $companies = Company::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->search != '')
            $companies = $companies->where('name','LIKE','%'.$request->search.'%')
                ->orWhere('area','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($companies->count(), $page,$paginate,$lang);

        $companies = $companies->paginate($paginate);

        return view('admin.companies.index', compact('companies', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'name'=>'required',
            'type'=>'required',
            'nit'=>'required|min:9',
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $company = Company::create($fields);

        if ($company) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/companies');
    }

    public function edit($id)
    {
        $company = Company::find($id);

        return view('admin.companies.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {        
        $company = Company::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name'=>'required',
            'type'=>'required',
            'nit'=>'required|min:9',
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $company = $company->update($fields);

        if ($company) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/companies');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company) {
            $company->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/companies');
    }
 
    public function export() 
    {
    return Excel::download(new CompaniesExport, 'companies.xlsx');
    }

    public function new_company(Request $request)
    {
        $lang = app()->getLocale();
        $companies = Company::orderBy('id','ASC')->edtCompanies();

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->search != '')
            $companies = $companies->where('name','LIKE','%'.$request->search.'%')
                ->orWhere('area','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($companies->count(), $page,$paginate,$lang);

        $companies = $companies->paginate($paginate);

        return view('admin.companies.new_companies', compact('companies', 'paginate','text_pagination'));
    }
}
