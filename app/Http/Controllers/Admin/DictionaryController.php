<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Language;
use App\Models\Dictionary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DictionaryController extends Controller
{
    public function __construct()
    {
        view()->share('section','dictionaries');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $dictionaries = Dictionary::orderBy('word', 'ASC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $dictionaries = $dictionaries->where('word', 'LIKE', '%' . $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($dictionaries->count(), $page, $paginate, $lang);

        $dictionaries = $dictionaries->paginate($paginate);

        return view('admin.dictionaries.index', compact('dictionaries', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        $list_langs = Language::orderBy('name', 'Asc')
        ->pluck('name', 'id');
        
        return view('admin.dictionaries.create',compact('list_langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'word'=>'required|min:3',
            'pronuntiation'=>'required|min:3',
            'meaning'=>'required',
            'language_id'=>'required|exists:languages,id'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $dictionary = Dictionary::create($fields);

        if ($dictionary) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/dictionaries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictionary = Dictionary::find($id);
        $list_langs = Language::orderBy('name', 'Asc')
        ->pluck('name', 'id');

        return view('admin.dictionaries.edit', compact('dictionarie','list_langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dictionary = Dictionary::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'word'=>'required|min:3',
            'pronuntiation'=>'required|min:3',
            'meaning'=>'required',
            'language_id'=>'required|exists:languages,id'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
                
        $dictionary = $dictionary->update($fields);

        if ($dictionary) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/dictionaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);

        if ($dictionary) {
            $dictionary->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/dictionaries');
    }
}
