<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Cancel;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CancelController extends Controller
{
    public function __construct()
    {
        view()->share('section','cancels');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $lang = app()->getLocale();
        $cancels = Cancel::orderBy('year','DESC')->orderBy('month','DESC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->search != '')
            $cancel = $cancel->where('name','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($cancels->count(), $page,$paginate,$lang);

        $cancels = $cancels->paginate($paginate);

        return view('admin.cancels.index', compact('cancels', 'paginate','text_pagination'));
    }

    public function create()
    {
        $list_services = Service::orderBy('name','asc')->pluck('name','id');
        $lang = strtolower(app()->getLocale());
        if($lang == 'en')
            $months = [
                '1'=>'January',
                '2'=>'February',
                '3'=>'March',
                '4'=>'April',
                '5'=>'May',
                '6'=>'June',
                '7'=>'July',
                '8'=>'August',
                '9'=>'September',
                '10'=>'October',
                '11'=>'November',
                '12'=>'December',
            ];
        else
            $months = [
                '1'=>'Enero',
                '2'=>'Febrero',
                '3'=>'Marzo',
                '4'=>'Abril',
                '5'=>'Mayo',
                '6'=>'Junio',
                '7'=>'Julio',
                '8'=>'Augusto',
                '9'=>'Septiembre',
                '10'=>'Octubre',
                '11'=>'Noviembre',
                '12'=>'Dicembre',
            ];
        
        return view('admin.cancels.create',compact('list_services','months'));
    }

    public function show(){/* show */}

    public function store(Request $request)
    {
        $v= Validator::make($request->all(),[
            'service_id'=>'required|exists:services,id',
            'month'=>'required',
            'amount'=>'required',
            'year'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $cancel = Cancel::create($fields);

        if ($cancel) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/cancels');
    }

    public function edit($id)
    {
        $cancel = Cancel::find($id);
        $list_services = Service::orderBy('name','asc')->pluck('name','id');
        $lang = strtolower(app()->getLocale());
        if($lang == 'en')
            $months = [
                '1'=>'January',
                '2'=>'February',
                '3'=>'March',
                '4'=>'April',
                '5'=>'May',
                '6'=>'June',
                '7'=>'July',
                '8'=>'August',
                '9'=>'September',
                '10'=>'October',
                '11'=>'November',
                '12'=>'December',
            ];
        else
            $months = [
                '1'=>'Enero',
                '2'=>'Febrero',
                '3'=>'Marzo',
                '4'=>'Abril',
                '5'=>'Mayo',
                '6'=>'Junio',
                '7'=>'Julio',
                '8'=>'Augusto',
                '9'=>'Septiembre',
                '10'=>'Octubre',
                '11'=>'Noviembre',
                '12'=>'Dicembre',
            ];

        return view('admin.cancels.edit',compact('cancel','list_services','months'));
    }

    public function update(Request $request, $id)
    {        
        $cancel = Cancel::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'service_id'=>'required|exists:services,id',
            'month'=>'required',
            'amount'=>'required',
            'year'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $cancel = $cancel->update($fields);

        if ($cancel) {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('update')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/cancels');
    }

    public function destroy($id)
    {
        $cancels = Cancel::findOrFail($id);
        if ($cancels) {
            $cancels->delete(); //delete phisically   
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }
    
        return redirect('admin/cancels');
    }
}
