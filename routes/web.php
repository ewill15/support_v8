<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', [AuthController::class,'loginform']);
// Route::get('login', [AuthController::class,'loginform']);
// Route::get('admin', [AuthController::class,'loginform']);


// Route::post('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);
// Route::get('logout', [AuthController::class,'logout']);
// Route::get('register', [AuthController::class,'registrationForm']);

// Route::group(['middleware'=>['auth'], 'prefix' => 'admin'], function(){
//     Route::get('dashboard', [DashboardController::class, 'index']);
//     Route::resource('users', UsersController::class);
//     Route::resource('pasanakus', PasanakusController::class);
//     Route::resource('userpasanakus', UserPasanakuController::class);
//     Route::get('pasanakus/{id}/penalty', [PasanakusController::class,'penalty']);
//     Route::get('pasanakus/{id}/add_participant', [PasanakusController::class,'form_add_participant']);
//     Route::post('pasanakus/{id}/add_participant', [PasanakusController::class,'add_participant']);
// });
