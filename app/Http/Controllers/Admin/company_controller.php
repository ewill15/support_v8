<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Company;
use App\Exports\CompaniesExport;
use Maatwebsite\Excel\Facades\Excel;

class company_controller extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $companies = $companies->where('name','LIKE','%'.$request->keyword.'%')
                ->orWhere('area','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($companies->count(), $page,$paginate);

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
            'name' => 'required|string',
            'address' => 'required|string',
            'nit' => 'required|string',
            'area' => 'required',
            'type' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $company = Company::create($fields);

        if ($company)
        {
            Session::flash('flash_message', 'Se ha creado una nueva empresa');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Hubo un error al crear empresa');
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
            'name' => 'required|string',
            'address' => 'required|string',
            'nit' => 'required|string',
            'area' => 'required',
            'type' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $company->update($fields);

        Session::flash('flash_message', 'Se ha actualizado la empresa');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/companies');
    }

    public function destroy($id)
    {
        $items = Company::findOrFail($id);
        if ($items) {
            $items->delete();

            Session::flash('flash_message', '¡Company deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'company culd not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/companies');
    }

    public function export() 
    {
        return Excel::download(new CompaniesExport, 'companies.xlsx');
    }
}
