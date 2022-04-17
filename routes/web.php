<?php

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

Auth::routes(['verify'=>true]);

define('PAGINATION_COUNT',10);

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'pharmacy', 'middleware' => 'guest:pharmacy'], function () {
    Route::get('login', 'LoginController@getPharmacyLogin')->name('get.pharmacy.login');
    Route::post('login', 'LoginController@PharmacyLogin')->name('pharmacy.login');
});
Route::group(['prefix' => 'pharmacy', 'middleware' => 'auth:Pharmacy'], function () {
    Route::get('/', 'DashboardController@index')->name('Pharmacy.dashboard');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
