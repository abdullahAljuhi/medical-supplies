<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use GuzzleHttp\Middleware;
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

Auth::routes(['verify' => true]);
define('PAGINATION', 10);

Route::group(['middleware' => 'auth'], function () {



    // Route::get('/', [PharmacyController::class, 'index'])->name('admin.pharmacy.index');

    // change password
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword.user');

    // admin
    Route::group(['prefix' => 'dashboard', 'middleware' => 'checkType:admin'], function () {

        // dashboard
        Route::get('/', function () {return view('home');})->name('dashboard');

        // Setting Routs
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/location', function () {return view('admin.location');})->name('location');
            Route::get('/city', [CityController::class, 'create'])->name('add-city');
            Route::post('/city/store', [CityController::class, 'store'])->name('store-city');
            Route::get('/state', [GovernorateController::class, 'create'])->name('add-state');
            Route::post('/state/store', [GovernorateController::class, 'store'])->name('store-state');
        }); // end users


        // crud Users
        Route::group(['prefix' => 'users'], function () {

            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');

            // start profile
            Route::group(['prefix' => 'profile'], function () {
                Route::get('/{id}', [UserProfileController::class, 'show'])->name('show.profile');
            }); // end show user profile

        }); // end users


        //crud advertisement
        Route::group(['prefix'=>'advertisement'],function(){
            Route::get('/show',[AdvertisementController::class,'show'])->name('show.adv');
            Route::get('/edit',[AdvertisementController::class,'edit'])->name('edit.adv');
            Route::post('/update',[AdvertisementController::class,'update'])->name('update.adv');
            Route::get('/delete',[AdvertisementController::class,'remove'])->name('delete.adv');
        });


        // crud city
        Route::resource('city', CityController::class)->except('show');

        //  crud governorate
        Route::resource('governorate', GovernorateController::class)->except('show');

        // crud pharmacy contact
        Route::resource('contact', ContactController::class)->except('show');


    //////////////////////////////////// pharmacy

    Route::group(['prefix' => 'pharmacy'], function () {
        Route::get('/', [MedicalController::class, 'index'])->name('admin.pharmacy');
        Route::get('/{pharmacy}', [PharmacyController::class, 'show'])->name('admin.pharmacy.show');
        Route::get('/active/{pharmacy}', [PharmacyController::class, 'active'])->name('admin.pharmacy.active');
        Route::get('/disActive/{pharmacy}', [PharmacyController::class, 'disActive'])->name('admin.pharmacy.disActive');
        Route::post('/update/{pharmacy}', [PharmacyController::class, 'update'])->name('pharmacy.update');

    });

    /////////////////////////////////////// end pharmacy

    });
        // pharmacy crud start
        Route::group(['prefix' => 'pharmacy', 'middleware' => ['checkType:pharmacy']], function () {
            Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.index');
            Route::get('/create', [PharmacyController::class, 'create'])->name('pharmacy.create');
            Route::post('/store', [PharmacyController::class, 'store'])->name('admin.pharmacy.store');
            Route::get('/edit/{pharmacy}', [PharmacyController::class, 'edit'])->name('admin.pharmacy.edit');
            // Route::post('/update/{pharmacy}', [PharmacyController::class, 'update'])->name('pharmacy.update');

        });// pharmacy crud end

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [UserProfileController::class, 'index'])->name('profile');
        Route::get('index', [UserProfileController::class, 'show'])->name('index.profile');
        Route::get('edit', [UserProfileController::class, 'edit'])->name('edit.profile');
        Route::post('update', [UserProfileController::class, 'update'])->name('update.profile');
    });

});

// Route::group(['prefix' => 'pharmacy', 'middleware' => ['checkType:pharmacy']], function () {
    Route::get('pharmacy/', [PharmacyController::class, 'index'])->name('pharmacy.index');
    Route::get('pharmacy/create', [PharmacyController::class, 'create'])->name('pharmacy.create');
    Route::post('pharmacy/store', [PharmacyController::class, 'store'])->name('admin.pharmacy.store');

// });
// main page
// Route::get('/', function () {return view('index');})->middleware('guest');
Route::get('/', function () {return view('index');});

// main page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

// start const route
Route::get('/about', function () {return view('about');})->name('about');

Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/partners', function () {return view('partner');})->name('partners');

Route::get('/pharmacies', function () {return view('pharmacy');})->name('pharmacies');

Route::get('/l', function () {return view('auth.registerNext');})->name('l');
// end const route
