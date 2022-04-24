<?php

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
// define('PAGINATION_COUNT',10);

Route::get('/', function () {
    return view('index');
});
Route::get('/l', function () {
    return view('404');
});
// Route::group(['prefix' => 'pharmacy', 'middleware' => 'guest:pharmacy'], function () {
//     Route::get('login', ['LoginController::class','getPharmacyLogin'])->name('get.pharmacy.login');
//     Route::post('login', 'LoginController@PharmacyLogin')->name('pharmacy.login');
// });
// Route::group(['prefix' => 'pharmacy', 'middleware' => 'auth:Pharmacy'], function () {
//     Route::get('/', 'DashboardController@index')->name('Pharmacy.dashboard');

// });
Route::group(['prefix' => 'users' , 'middleware' => 'admin'], function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');;
});
Route::group(['prefix' => 'Admin' , 'middleware' => 'admin'], function () {

    Route::get('/',function(){
        $data=[
            'admin'=>'you admin'
        ];
        return $data;
        // return response()->json($data);
    });
});
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [UserProfileController::class,'index'])->name('');
    Route::get('edit', [UserProfileController::class,'edit'])->name('edit.profile');
    Route::post('update', [UserProfileController::class,'update'])->name('update.profile');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
