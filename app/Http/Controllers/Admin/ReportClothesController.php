<?php

namespace App\Http\Controllers\Admin;

use App\Models\SaleClothes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportClothesController extends Controller
{
    public function __construct()
    {
        view()->share('section','report_clothes');
    }

    public function summaryByDate(Request $request)
    {
        dd('dddddddddddddddddddddddddddddddddddddd');
        // $summariesByDate = SaleClothes::summaryByDate()->get();
        // dd($sumariesByDate);
        // return view('admin.clothes.summary', compact('summariesByDate'));
    }
}
