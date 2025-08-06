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
        $clothes = SaleClothe::orderBy('date_sale', 'DESC');
        
        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if ($request->search != '')
            $clothes = $clothes->where('description', 'LIKE', '%' . $request->search . '%');

        $text_pagination = Helper::messageCounterPagination($clothes->count(), $page, $paginate, $lang);

        $clothes = $clothes->paginate($paginate);
        $registros_full = $this->getFullData();
        $registros_monthly = $this->getMonthlyData();
        $registros_weekly = $this->getWeeklyData();
        $registros_today = $this->getTodayData();
        // dd($registros_weekly);
        return view('admin.clothes.index', compact('clothes', 'paginate', 'text_pagination','registros_full','registros_monthly','registros_weekly','registros_today'));
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
        $fields['week'] = Carbon::parse($request->day_sale)->weekOfYear;
        $fields['year'] = Carbon::parse($request->day_sale)->year;
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
        $fields['week'] = Carbon::parse($request->day_sale)->weekOfYear;
        $fields['year'] = Carbon::parse($request->day_sale)->year;
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
    public function getTodayData()#(Request $request)
    {
        $result = [
            "msg"=> 'Error',
            "items"=>-1
        ];

        $today = Carbon::now()->format('Y-m-d');

        $income = SaleClothe::incomeToday($today)->get();
        $income_qr = SaleClothe::incomeQRToday($today)->get();

        $expenses = SaleClothe::expenseToday($today)->get();
        $expenses_qr = SaleClothe::expenseQRToday($today)->get()->toArray();

        $clothes = SaleClothe::clothesToday($today)->get()->toArray();

        $registros['income'] = $income[0]['total'] ??['total'=>0];
        $registros['iqr'] = $income_qr[0]['total'] ??['total'=>0];
        $registros['expenses'] = $expenses[0]['total'] ??['total'=>0];
        $registros['eqr'] = $expenses_qr[0]['total']??['total'=>0];
        $registros['clothes'] = $clothes[0]['prendas']??['prendas'=>0];


        $result["msg"] = "Se encontraron registros el dia de hoy";
        $result["items"] = $registros;


        return $registros;
    }

    /**
     * $type >>  1=Efectivo   0=QR
     */
    public function getWeeklyData()#(Request $request)
    {
        $result = [
            "msg"=> 'Error',
            "items"=>-1
        ];

        $anio = Carbon::now()->year;
        $semana = Carbon::now()->weekOfYear;#$request->week ? Carbon::parse($request->week)->weekOfYear : Carbon::now()->weekOfYear;

        $inicioSemana = Carbon::now()->setISODate($anio, $semana)->startOfWeek();
        $finSemana = $inicioSemana->copy()->endOfWeek()->format('Y-m-d');

        $income = SaleClothe::incomeWeek($inicioSemana->format('Y-m-d'),$finSemana,$anio)->get();
        $income_qr = SaleClothe::incomeQRWeek($inicioSemana->format('Y-m-d'),$finSemana,$anio)->get();

        $expenses = SaleClothe::expenseWeek($inicioSemana->format('Y-m-d'),$finSemana,$anio)->get();
        $expenses_qr = SaleClothe::expenseQRWeek($inicioSemana->format('Y-m-d'),$finSemana,$anio)->get()->toArray();

        $clothes = SaleClothe::clothesWeek($inicioSemana->format('Y-m-d'),$finSemana,$anio)->get()->toArray();

        $registros['income'] = $income[0]['total'] ??['total'=>0];
        $registros['iqr'] = $income_qr[0]['total'] ??['total'=>0];
        $registros['expenses'] = $expenses[0]['total'] ??['total'=>0];
        $registros['eqr'] = $expenses_qr[0]['total']??['total'=>0];
        $registros['clothes'] = $clothes[0]['prendas']??['prendas'=>0];


        $result["msg"] = "Se encontraron registros en la semana $semana en $anio";
        $result["items"] = $registros;


        return $registros;

    }
    public function getMonthlyData()#(Request $request)
    {
        $result = [
            "msg"=> 'Error',
            "items"=>-1
        ];

        $anio = Carbon::now()->year;
        $mes = Carbon::now()->month; # $request->month ? Carbon::parse($request->month)->month : Carbon::now()->month; // 7 (julio)

        $income = SaleClothe::incomeMonth($mes,$anio)->get();
        $income_qr = SaleClothe::incomeQRMonth($mes,$anio)->get();

        $expenses = SaleClothe::expenseMonth($mes,$anio)->get();
        $expenses_qr = SaleClothe::expenseQRMonth($mes,$anio)->get()->toArray();

        $clothes = SaleClothe::clothesMonth($mes,$anio)->get()->toArray();

        $registros['income'] = $income->isNotEmpty() ? $income[0]->toArray():0;
        $registros['iqr'] = $income_qr->isNotEmpty() ? $income_qr[0]->toArray():0;
        $registros['expenses'] = $expenses->isNotEmpty() ? $expenses[0]->toArray():0;
        $registros['eqr'] = $expenses_qr[0]['total']??['total'=>0];
        $registros['clothes'] = $clothes[0]['prendas']??['prendas'=>0];

        $result["msg"] = "Se encontraron registros en el mes $mes en $anio";
        $result["items"] = $registros;

        return $registros;
    }

    public function getFullData()#(Request $request)
    {
        $result = [
            "msg"=> 'Error',
            "items"=>-1
        ];


        $income = SaleClothe::incomeFull()->get();
        $income_qr = SaleClothe::incomeQRFull()->get();

        $expenses = SaleClothe::expenseFull()->get();
        $expenses_qr = SaleClothe::expenseQRFull()->get()->toArray();

        $clothes = SaleClothe::clothesFull()->get()->toArray();

        $registros['income'] = $income->isNotEmpty() ? $income[0]->toArray():0;
        $registros['iqr'] = $income_qr->isNotEmpty() ? $income_qr[0]->toArray():0;
        $registros['expenses'] = $expenses->isNotEmpty() ? $expenses[0]->toArray():0;
        $registros['eqr'] = $expenses_qr[0]['total']??['total'=>0];
        $registros['clothes'] = $clothes[0]['prendas']??['prendas'=>0];

        $result["msg"] = "Estos son todos los registros";
        $result["items"] = $registros;

        return $registros;
    }


    
}
