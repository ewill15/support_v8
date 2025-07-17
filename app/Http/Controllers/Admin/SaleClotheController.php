<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\SaleClothe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SaleClotheController extends Controller
{
    public function __construct()
    {
        view()->share('section','sale_clothes');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $clothes = SaleClothe::orderBy('id', 'DESC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $clothes = $clothes->where('description', 'LIKE', '%' . $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($clothes->count(), $page, $paginate, $lang);

        $clothes = $clothes->paginate($paginate);

        return view('admin.clothes.index', compact('clothes', 'paginate', 'text_pagination'));
    }

    public function create()
    {
        return view('admin.clothes.create');
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
            'price' => 'required',
            'type' => 'required',
            'pay_type' => 'required'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        $fields['date_sale'] = Carbon::parse($request->day_sale)->format('Y-m-d');
        $clothe = SaleClothe::create($fields);

        if ($clothe) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/clothes');
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
        $clothe = SaleClothe::find($id);
        // $guarantees = clothe::orderBy('last_name', 'Asc')
        // ->clothes()
        // ->get()
        // ->pluck('full_name', 'id');

        return view('admin.clothes.edit', compact('clothe'));
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
        $clothe = SaleClothe::find($id);
        $fields = $request->all();

        $v = Validator::make($request->all(), [
            'description' => 'required|string|min:3',
            'price' => 'required',
            'type' => 'required',
            'pay_type' => 'required'
        ]);
        if ($v && $v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $fields['date_sale'] = Carbon::parse($request->day_sale)->format('Y-m-d');
        $clothe = $clothe->update($fields);

        if ($clothe) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/clothes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $clothe = SaleClothe::findOrFail($id);

        if ($clothe) {
            $clothe->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        
        return redirect('admin/clothes');
    }

    /**
     * pay_type >> 1=Efectivo 0=QR
     * type >> 1=Ingreso 0=Gasto
     */
    public function sumTotal(Request $request,$date)
    {
        $partial = SaleClothe::whereDate('date', '=', Carbon::parse($request->date)->toDateString());

        if($request->type)
            $partial = $partial->where('type','1');
        else
            $partial = $partial->where('type','0');


        if($request->pay_type)
            $partial = $partial->where('pay_type','1');
        else
            $partial = $partial->where('pay_type','0');

        $partial = $partial->get();
        
        if($partial)
            $total = 'Error';
        else
            $total = $partial->sum('price');
    }
}
