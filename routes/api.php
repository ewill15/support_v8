<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\RegisterWebController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are aded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy bu1ilding your API!
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

    /** REGISTER WEB */
    Route::get('list_web_register',[RegisterWebController::class,'list_web_registers']);
    Route::post('add_web_register',[RegisterWebController::class,'set_web_register']);
    Route::post('edit_web_register',[RegisterWebController::class,'edit_web_register']);
    Route::post('delete_web_register',[RegisterWebController::class,'delete_web_register']);

    /** RESTAURANT */
    Route::get('list_restaurant',[RestaurantController::class,'list_restaurants']);
    Route::post('add_restaurant',[RestaurantController::class,'set_restaurant']);
    Route::post('edit_restaurant',[RestaurantController::class,'edit_restaurant']);
    Route::post('delete_restaurant',[RestaurantController::class,'delete_restaurant']);

    /** DISHES RESTAURANT */
    Route::get('list_dish',[DishController::class,'list_dishs']);
    Route::post('add_dish',[DishController::class,'set_dish']);
    Route::post('edit_dish',[DishController::class,'edit_dish']);
    Route::post('delete_dish',[DishController::class,'delete_dish']);

    /** SERVICES */
    Route::get('list_service',[ServiceController::class,'list_services']);
    Route::post('add_service',[ServiceController::class,'set_service']);
    Route::post('edit_service',[ServiceController::class,'edit_service']);
    Route::post('delete_service',[ServiceController::class,'delete_service']);

    /** PAYMENT */
    Route::get('list_payments',[PaymentController::class,'list_payments']);
    Route::post('add_payment',[PaymentController::class,'set_payment']);
    Route::post('edit_payment',[PaymentController::class,'edit_payment']);
    Route::post('delete_payment',[PaymentController::class,'delete_payment']);
});
