<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
// use App\Http\Controllers\Admin\TypesController;
// use App\Http\Controllers\Admin\BrandsController;
// use App\Http\Controllers\Admin\BannersController;
// use App\Http\Controllers\Admin\ClientsController;
// use App\Http\Controllers\Admin\IncomesController;
// use App\Http\Controllers\Admin\OriginsController;
// use App\Http\Controllers\Admin\PaymentsController;
// use App\Http\Controllers\Admin\ProductsController;
// use App\Http\Controllers\Admin\VouchersController;
// use App\Http\Controllers\Admin\CompaniesController;
// use App\Http\Controllers\Admin\GalleriesController;
// use App\Http\Controllers\Admin\ProvidersController;
// use App\Http\Controllers\Admin\SucursalsController;
// use App\Http\Controllers\Admin\CategoriesController;
// use App\Http\Controllers\Admin\CurrenciesController;
// use App\Http\Controllers\Admin\PrototypesController;
// use App\Http\Controllers\Admin\Type_usersController;
// use App\Http\Controllers\Admin\WarehousesController;
// use App\Http\Controllers\Admin\Debts_to_payController;
// use App\Http\Controllers\Admin\SubcategoriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [AuthController::class,'loginform']);
Route::get('admin', [AuthController::class,'loginform']);
Route::get('login', [AuthController::class,'loginform']);
Route::post('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);
Route::get('logout', [AuthController::class,'logout']);
Route::get('register', [AuthController::class,'registrationForm']);

Route::group(['middleware'=>['auth'], 'prefix' => 'admin'], function(){

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UsersController::class);
//     Route::resource('personals', PersonalsController::class);
//     Route::post('personals/soft/{id}',[PersonalsController::class, 'softdestroy']);
//     Route::post('personals/restore/{id}',[PersonalsController::class, 'restore']);
//     Route::post('personals/change_email',[PersonalsController::class, 'change_email']);
//     Route::resource('providers', ProvidersController::class);
//     Route::post('providers/soft/{id}',[ProvidersController::class, 'softdestroy']);
//     Route::post('providers/restore/{id}',[ProvidersController::class, 'restore']);
//     Route::resource('clients', ClientsController::class);
//     Route::post('clients/soft/{id}',[ClientsController::class, 'softdestroy']);
//     Route::post('clients/restore/{id}',[ClientsController::class, 'restore']);
//     /* ------------ Start  Catalogs   --------------------*/
//     Route::resource('brands', BrandsController::class);
//     Route::post('brands/soft/{id}',[BrandsController::class, 'softdestroy']);
//     Route::post('brands/restore/{id}',[BrandsController::class, 'restore']);
//     Route::resource('prototypes', PrototypesController::class);
//     Route::post('prototypes/soft/{id}',[PrototypesController::class, 'softdestroy']);
//     Route::post('prototypes/restore/{id}',[PrototypesController::class, 'restore']);
//     Route::resource('categories', CategoriesController::class);
//     Route::post('categories/soft/{id}',[CategoriesController::class, 'softdestroy']);
//     Route::post('categories/restore/{id}',[CategoriesController::class, 'restore']);
//     Route::resource('subcategories', SubcategoriesController::class);
//     Route::post('subcategories/soft/{id}',[SubcategoriesController::class, 'softdestroy']);
//     Route::post('subcategories/restore/{id}',[SubcategoriesController::class, 'restore']);
//     Route::resource('origins', OriginsController::class);
//     Route::post('origins/soft/{id}',[OriginsController::class, 'softdestroy']);
//     Route::post('origins/restore/{id}',[OriginsController::class, 'restore']);
//     Route::resource('types', TypesController::class);
//     Route::post('types/soft/{id}',[TypesController::class, 'softdestroy']);
//     Route::post('types/restore/{id}',[TypesController::class, 'restore']);
//     Route::resource('type_users', Type_usersController::class);
//     Route::post('type_users/soft/{id}',[Type_usersController::class, 'softdestroy']);
//     Route::post('type_users/restore/{id}',[Type_usersController::class, 'restore']);
//     Route::resource('vouchers', VouchersController::class);
//     Route::post('vouchers/soft/{id}',[VouchersController::class, 'softdestroy']);
//     Route::post('vouchers/restore/{id}',[VouchersController::class, 'restore']);
//     Route::resource('currencies', CurrenciesController::class);
//     Route::post('currencies/soft/{id}',[CurrenciesController::class, 'softdestroy']);
//     Route::post('currencies/restore/{id}',[CurrenciesController::class, 'restore']);
//     Route::resource('payments', PaymentsController::class);
//     Route::post('payments/soft/{id}',[PaymentsController::class, 'softdestroy']);
//     Route::post('payments/restore/{id}',[PaymentsController::class, 'restore']);
//     /* ------------ End routes Catalogs   --------------------*/
//     Route::resource('companies', CompaniesController::class);
//     Route::post('companies/soft/{id}',[CompaniesController::class, 'softdestroy']);
//     Route::post('companies/restore/{id}',[CompaniesController::class, 'restore']);
//     Route::resource('banners', BannersController::class);
//     Route::post('banners/soft/{id}',[BannersController::class, 'softdestroy']);
//     Route::post('banners/restore/{id}',[BannersController::class, 'restore']);
//     Route::resource('warehouses', WarehousesController::class);
//     Route::post('warehouses/soft/{id}',[WarehousesController::class, 'softdestroy']);
//     Route::post('warehouses/restore/{id}',[WarehousesController::class, 'restore']);
//     Route::resource('sucursals', SucursalsController::class);
//     Route::post('sucursals/soft/{id}',[SucursalsController::class, 'softdestroy']);
//     Route::post('sucursals/restore/{id}',[SucursalsController::class, 'restore']);
//     Route::resource('products', ProductsController::class);
//     Route::post('products/soft/{id}',[ProductsController::class, 'softdestroy']);
//     Route::post('products/restore/{id}',[ProductsController::class, 'restore']);
//     Route::get('products/{id}/images',[ProductsController::class, 'images']);
//     Route::post('product/store_image',[ProductsController::class, 'store_image']);
//     Route::post('product/edit_state_image',[ProductsController::class, 'edit_state_image']);
//     Route::post('product/delete_image',[ProductsController::class, 'delete_image']);
//     Route::get('products/{id}/detail',[ProductsController::class, 'productDetail']);

//     Route::resource('incomes', IncomesController::class);
//     Route::get('incomes/{id}/debts',[Debts_to_payController::class, 'index']);
//     Route::resource('debts', Debts_to_payController::class);
//     Route::post('debts/soft/{id}',[Debts_to_payController::class, 'softdestroy']);
//     Route::post('debts/restore/{id}',[Debts_to_payController::class, 'restore']);

// /** Route of ajax */
//     Route::post('incomes/prototypes/brand',[PrototypesController::class, 'prototypeByBrand']);
//     Route::post('incomes/brands/product',[ProductsController::class, 'productByBrand']);
});