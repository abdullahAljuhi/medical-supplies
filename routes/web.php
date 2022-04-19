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

Auth::routes(['verify'=>true]);

define('PAGINATION_COUNT',10);

Route::get('/', function () {
    return view('welcome');
});
// Route::group(['prefix' => 'pharmacy', 'middleware' => 'guest:pharmacy'], function () {
//     Route::get('login', ['LoginController::class','getPharmacyLogin'])->name('get.pharmacy.login');
//     Route::post('login', 'LoginController@PharmacyLogin')->name('pharmacy.login');
// });
// Route::group(['prefix' => 'pharmacy', 'middleware' => 'auth:Pharmacy'], function () {
//     Route::get('/', 'DashboardController@index')->name('Pharmacy.dashboard');
    
// });
Route::group(['prefix' => '' , 'middleware' => 'admin'], function () {
    Route::get('/', 'UsersController@index')->name('admin.users.index');
    Route::get('/create', 'UsersController@create')->name('admin.users.create');
    Route::post('/store', 'UsersController@store')->name('admin.users.store');
});
Route::group(['prefix' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});
Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('update.profile');
});