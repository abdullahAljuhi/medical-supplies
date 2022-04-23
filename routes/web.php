<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
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
//

Auth::routes(['verify'=>true]);
define('PAGINATION',10);

Route::group(['middleware' => 'auth'], function () {

});
// 'middleware' => 'checkType:admin'
Route::group(['prefix' => 'pharmacy'], function () {
    Route::get('/', [PharmacyController::class, 'index'])->name('admin.pharmacy.index');
    Route::get('/create', [PharmacyController::class, 'create'])->name('admin.pharmacy.create');
    Route::post('/store', [PharmacyController::class, 'store'])->name('admin.pharmacy.store');
    Route::get('/edit/{id}', [PharmacyController::class, 'edit'])->name('admin.pharmacy.edit');
    Route::post('/update/{id}', [PharmacyController::class, 'update'])->name('admin.pharmacy.update');
});



Route::get('/', function () {
    return view('welcome');
});

    // Route::get('login', ['LoginController::class','getPharmacyLogin'])->name('get.pharmacy.login');
    // Route::post('login', 'LoginController@PharmacyLogin')->name('pharmacy.login');

// Route::group(['prefix' => 'pharmacy', 'middleware' => 'auth:Pharmacy'], function () {
//     Route::get('/', 'DashboardController@index')->name('Pharmacy.dashboard');
    
// });

Route::group(['prefix' => 'Admin' , 'middleware' => 'checkType:admin'], function () {

    Route::get('/',function(){
        $data=[
            'admin'=>'you admin'
        ];
        return $data;
        // return response()->json($data);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
    });
});
Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', [UserProfileController::class,'edit'])->name('edit.profile');
    Route::post('update', [UserProfileController::class,'update'])->name('update.profile');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::resource('city', CityController::class)->except('show');
Route::resource('governorate', GovernorateController::class)->except('show');
Route::resource('contact', ContactController::class)->except('show');

