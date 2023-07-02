<?php

namespace App\Http\Controllers\Admin;

use App\Models\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $user;

    public function __construct()
    {
        view()->share('sectionA','');
        view()->share('section','dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $test = Helper::getToken();

        return view('admin.dashboard', compact('test'));
    }
}
