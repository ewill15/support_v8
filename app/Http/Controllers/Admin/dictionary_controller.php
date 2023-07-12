<?php

namespace App\Http\Controllers\admin;

use App\Helper;
use App\Dictionary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class dictionary_controller extends Controller
{
    public function index(Request $request)
    {
        $dictionaries = Dictionary::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $dictionaries = $dictionaries->where('word','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($dictionaries->count(), $page,$paginate);

        $dictionaries = $dictionaries->paginate($paginate);

        return view('admin.dictionaries.index', compact('dictionaries', 'paginate','text_pagination'));
    }

    public function create()
    {
        return view('admin.dictionaries.create');
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'word' => 'required',
            'pronuntiation' => 'required',
            'meaning' => 'required',
            'example' => ''
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $dictionarie = Dictionary::create($fields);

        if ($dictionarie)
        {
            Session::flash('flash_message', 'New word created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating word');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/dictionaries');
    }

    public function edit($id)
    {
        $word = Dictionary::find($id);

        return view('admin.dictionaries.edit',compact('word'));
    }

    public function update(Request $request, $id)
    {        
        $dictionarie = Dictionary::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'word' => 'required',
            'pronuntiation' => 'required',
            'meaning' => 'required',
            'example' => ''
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $dictionarie->update($fields);

        Session::flash('flash_message', 'Word updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/dictionaries');
    }

    public function destroy($id)
    {
        $dictionarie = Dictionary::findOrFail($id);
        if ($dictionarie) {
            $dictionarie->delete();

            Session::flash('flash_message', '¡Word deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Word could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/dictionaries');
    }
}
