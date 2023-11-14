<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;
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
});
