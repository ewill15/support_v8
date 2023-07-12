<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rule;
use App\Models\User;
use App\Models\Penalty;
use App\Models\Pasanaku;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('section','dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $register['users'] = count(User::users()->get());

        return view('admin.dashboard',compact('register'));
    }
}
