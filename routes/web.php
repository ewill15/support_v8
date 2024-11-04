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
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\QuarentineController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\MachineController;
use App\Http\Controllers\Admin\DictionaryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\PasanakusController;

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
    Route::resource('companies', CompanyController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('cancels', CancelController::class);
    Route::resource('songs', SongController::class);
    Route::resource('quarentines', QuarentineController::class);
    Route::resource('bills', BillController::class);
    Route::resource('accounts', AccountController::class);
    Route::resource('machines', MachineController::class);
    Route::resource('dictionaries', DictionaryController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('webs', RegisterController::class);

    Route::post('hash_pwd/{id}', [RegisterController::class, 'hashPassword']);
    Route::get('webs/{id}/d-data', [RegisterController::class, 'displayData']);

    Route::get('webs/{id}/edit-password', [RegisterController::class,'frm_new_password']);
    Route::post('webs/{id}/edit-password', [RegisterController::class,'new_password']);

    Route::get('export', [BackupController::class,'export']);
    Route::get('export-table', [BackupController::class,'export_table']);

    Route::resource('credits', CreditController::class);

    Route::resource('pasanakus', PasanakusController::class);

    Route::get('autocomplete', [BillController::class,'autocomplete'])->name('autocomplete');
    Route::get('company/new_record', [CompanyController::class,'new_company']);
});