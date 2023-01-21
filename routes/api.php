<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\BillController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are aded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {   
    
    /** AUTHENTICATION  */ 
    Route::post('register',[UserController::class,'register_user']);
    Route::post('login',[UserController::class,'login']);
    Route::post('logout',[UserController::class,'logout']);
    // Route::post('recovery_password','Api\v1@recovery_password_client');
    Route::post('password',[UserController::class,'update_password']);
    Route::post('edit_user',[UserController::class,'edit_user']);
    Route::post('delete_user',[UserController::class,'delete_user']);
    Route::get('list_users',[UserController::class,'list_users']);
    // /** Apis para admin  */
    // /** WORDS */ 
    // Route::post('add_word','Api\v1@set_word');
    // Route::post('edit_word','Api\v1@edit_word');
    // Route::get('list_words','Api\v1@list_words');
    // Route::post('delete_word','Api\v1@delete_word');
    // /** TENSES */
    // Route::get('list_tenses','Api\v1@list_tenses');
    // Route::post('add_tense','Api\v1@set_tense');
    // Route::post('edit_tense','Api\v1@edit_tense');
    // Route::post('delete_tense','Api\v1@delete_tense');

    /** APIs */
    /** ROLES */
    Route::get('list_roles',[RoleController::class,'list_roles']);
    Route::post('add_role',[RoleController::class,'set_role']);
    Route::post('edit_role',[RoleController::class,'edit_role']);
    Route::post('delete_role',[RoleController::class,'delete_role']);

    /** COMPANIES */
    Route::get('list_companys',[CompanyController::class,'list_companies']);
    Route::post('add_company',[CompanyController::class,'set_company']);
    Route::post('edit_company',[CompanyController::class,'edit_company']);
    Route::post('delete_company',[CompanyController::class,'delete_company']);

    /** BILLS */
    Route::get('list_bills',[BillController::class,'list_bills']);
    Route::post('add_bill',[BillController::class,'set_bill']);
    Route::post('edit_bill',[BillController::class,'edit_bill']);
    Route::post('delete_bill',[BillController::class,'delete_bill']);
});
