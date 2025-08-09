<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventaryController extends Controller
{
    


    public function __construct()
    {
        view()->share('section','legend_clothes');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $inventary = Inventary::orderBy('id', 'DESC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $inventary = $inventary->where('description', 'LIKE', '%' . $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($inventary->count(), $page, $paginate, $lang);

        $inventary = $inventary->paginate($paginate);
        
        return view('admin.inventary_clothes.index', compact('clothes', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        return view('admin.inventary_clothes.create');
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
            'description' => 'required|string|min:3',
            'size' => 'required',
            'buy_price' => 'required',
            'code' => 'required',
            'date_in' => 'required',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        $inventary_clothe = Inventary::create($fields);

        if ($inventary_clothe) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/inventary_clothes');
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
        $inventary_clothe = Inventary::find($id);

        return view('admin.inventary_clothes.edit', compact('clothe'));
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
        $inventary_clothes = Inventary::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'description' => 'required|string|min:3',
            'size' => 'required',
            'buy_price' => 'required',
            'code' => 'required',
            'date_in' => 'required',
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $inventary_clothes = $inventary_clothes->update($fields);

        if ($inventary_clothes) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/inventary_clothes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $inventary_clothes = Inventary::findOrFail($id);

        if ($inventary_clothes) {
            $inventary_clothes->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/inventary_clothes');
    }
}
