<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CancelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [AuthController::class,'loginform']);
Route::get('login', [AuthController::class,'loginform']);
Route::get('admin', [AuthController::class,'loginform']);
Route::post('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);
Route::get('logout', [AuthController::class,'logout']);
Route::get('register', [AuthController::class,'registrationForm']);

Route::group(['middleware'=>['auth'], 'prefix' => 'admin'], function(){
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UsersController::class);
    Route::resource('banks', BankController::class);
    Route::resource('companies',CompanyController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('cancels',CancelController::class);
    
});