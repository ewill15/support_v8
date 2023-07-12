<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\\FrontendController@index');

Route::get('admin', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function () {    
    Route::resource('users','Admin\\UserController');
    Route::resource('bills','Admin\\bill_controller');
    Route::resource('companies','Admin\\company_controller');

    Route::resource('banks','Admin\\bank_controller');
    Route::resource('accounts','Admin\\account_controller');
    Route::resource('services','Admin\\service_controller');
    Route::resource('cancel','Admin\\cancel_controller');
    Route::resource('songs','Admin\\song_controller');
    Route::resource('quarentines','Admin\\quarentine_controller');
    Route::resource('machines','Admin\\machine_controller');
    Route::resource('dictionaries','Admin\\dictionary_controller');
    Route::resource('tasks','Admin\\task_controller');
    Route::resource('resumes','Admin\\resume_controller');
    Route::resource('resumes.jobs','Admin\\job_controller');
    Route::resource('sections','Admin\\section_controller');
    Route::resource('sections.questions','Admin\\question_controller');
    Route::resource('registers','Admin\\RegisterController');
});
Route::get('users/export', 'Admin\\UserController@export');
//reset password
Route::get('password/email/{id}', 'Admin\\UserResetPasswordController@showLinkRequestForm');
Route::post('reset_password_without_token', 'Admin\\UserResetPasswordController@validatePasswordRequest');
Route::post('reset_password_with_token', 'Admin\\UserResetPasswordController@resetPassword');


Route::get('bills/export', 'Admin\\bill_controller@export');
Route::get('companies/export', 'Admin\\company_controller@export');
Route::get('banks/export', 'Admin\\bank_controller@export');

