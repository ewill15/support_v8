<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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
    // Route::post('logout','Api\v1@logout');
    // Route::post('recovery_password','Api\v1@recovery_password_client');
    // Route::post('update_password','Api\v1@update_password');

    // /** Apis para admin  */
    // /** USERS */
    // Route::get('list_users','Api\v1@list_users');
    // Route::post('add_user','Api\v1@set_user');
    // Route::post('edit_user','Api\v1@edit_user');    
    // Route::post('delete_user','Api\v1@delete_user');
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
});
