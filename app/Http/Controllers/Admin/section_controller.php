<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class section_controller extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::orderBy('id','DESC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $sections = $sections->where('name','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($sections->count(), $page,$paginate);

        $sections = $sections->paginate($paginate);

        return view('admin.sections.index', compact('sections', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.sections.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $section = Section::create($fields);

        if ($section)
        {
            Session::flash('flash_message', 'New section created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating section');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/sections');
    }

    public function edit($id)
    {
        $section = Section::find($id);

        return view('admin.sections.edit',compact('section'));
    }

    public function update(Request $request, $id)
    {        
        $section = Section::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $section->update($fields);

        Session::flash('flash_message', 'section updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/sections');
    }

    public function destroy($id)
    {
        $section = section::findOrFail($id);
        if ($section) {
            $section->delete();

            Session::flash('flash_message', '¡section deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'section could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/sections');
    }
}
