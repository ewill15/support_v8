<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class resume_controller extends Controller
{
    public function index(Request $request)
    {
        $resumes = Resume::orderBy('id','DESC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $resumes = $resumes->where('first_name','LIKE','%'.$request->keyword.'%')
            ->orWhere('last_name','LIKE','%'.$request->keyword.'%')
            ->orWhere('username','LIKE','%'.$request->keyword.'%')
            ->orWhere('email','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($resumes->count(), $page,$paginate);

        $resumes = $resumes->paginate($paginate);

        return view('admin.resumes.index', compact('resumes', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.resumes.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'username' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $resume = Resume::create($fields);

        if ($resume)
        {
            Session::flash('flash_message', 'New resume created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating resume');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/resumes');
    }

    public function edit($id)
    {
        $resume = Resume::find($id);

        return view('admin.resumes.edit',compact('resume'));
    }

    public function update(Request $request, $id)
    {        
        $resume = Resume::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'username' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $resume->update($fields);

        Session::flash('flash_message', 'Resume updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/resumes');
    }

    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        if ($resume) {
            $resume->delete();

            Session::flash('flash_message', '¡Resume deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Resume could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/resumes');
    }
}
