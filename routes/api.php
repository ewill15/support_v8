<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\BankController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\CompanyController;
use App\Http\Controllers\Api\v1\MachineController;
use App\Http\Controllers\Api\v1\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix'=>'v1'], function(){
    //login
    Route::post('login', [UserController::class,'login']);
    //user register
    Route::post('register', [UserController::class,'register_user']);
    //list
    Route::get('list_users', [UserController::class,'list_users']);
    //list register web
    Route::get('list_web_register', [RegisterController::class,'list_web']);
    //search
    Route::get('search_web_register', [RegisterController::class,'search_web']);
    //add
    Route::post('add_web_register', [RegisterController::class,'add_web_register']);
    //edit
    Route::post('edit_web_register', [RegisterController::class,'edit_web_register']);
    //delete
    Route::post('delete_web_register', [RegisterController::class,'remove_web_register']);
    //change password web register
    Route::post('change_password_web_register', [RegisterController::class,'renew_password']);
    //display data web register
    Route::get('data_web_register', [RegisterController::class,'display_data']);

    //list bank
    Route::get('list_banks', [BankController::class,'list_bank']);
    //search
    Route::get('search_bank', [BankController::class,'search_bank']);
    //add
    Route::post('add_bank', [BankController::class,'add_bank']);
    //edit
    Route::post('edit_bank', [BankController::class,'edit_bank']);
    //delete
    Route::post('delete_bank', [BankController::class,'remove_bank']);
    //list company
    Route::get('list_companies', [CompanyController::class,'list_companies']);
    //search
    Route::get('search_company', [CompanyController::class,'search_company']);
    //add
    Route::post('add_company', [CompanyController::class,'add_company']);
    //edit
    Route::post('edit_company', [CompanyController::class,'edit_company']);
    //delete
    Route::post('delete_company', [CompanyController::class,'remove_company']);

    //Machine
    //list
    Route::get('list_machines', [MachineController::class,'list_machines']);
    //search
    Route::get('search_machine', [MachineController::class,'search_machine']);
    //add
    Route::post('add_machine', [MachineController::class,'add_machine']);
    //edit
    Route::post('edit_machine', [MachineController::class,'edit_machine']);
    //delete
    Route::post('delete_machine', [MachineController::class,'remove_machine']);
});
