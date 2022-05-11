<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\dashboard\adminController;
use App\Http\Controllers\dashboard\PharmacyController as MangePharmacy;

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



Route::group(['middleware' => ['auth', 'verified']], function () {

    // main page after login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // change password
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword.user');

    // admin
    Route::group(['prefix' => 'dashboard', 'middleware' => 'checkType:admin'], function () {
        
        Route::get('/', [adminController::class, 'index'])->name('dashboard'); // dashboard

        // Setting Routs
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/location', function () {
                return view('admin.location');
            })->name('location');
            Route::get('/city', [CityController::class, 'create'])->name('add-city');
            Route::post('/city/store', [CityController::class, 'store'])->name('store-city');
            Route::get('/state', [GovernorateController::class, 'create'])->name('add-state');
            Route::post('/state/store', [GovernorateController::class, 'store'])->name('store-state');
        }); // end users


        // crud Users
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [adminController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
            // start profile
            Route::group(['prefix' => 'profile'], function () {
                Route::get('/{id}', [UserProfileController::class, 'show'])->name('show.profile');
            }); // end show user profile

        }); // end users


        //crud advertisement
        Route::group(['prefix' => 'advertisement'], function () {
            Route::get('/show', [AdvertisementController::class, 'show'])->name('show.adv');
            Route::get('/edit', [AdvertisementController::class, 'edit'])->name('edit.adv');
            Route::post('/update', [AdvertisementController::class, 'update'])->name('update.adv');
            Route::get('/delete', [AdvertisementController::class, 'remove'])->name('delete.adv');
        });



        // crud pharmacy contact
        Route::resource('contact', ContactController::class)->except('show');


        //////////////////////////////////// pharmacy dashboard

        Route::group(['prefix' => 'pharmacy'], function () {
            Route::get('/all', [adminController::class, 'pharmacies'])->name('admin.pharmacies.all'); // show all pharmacies

            Route::get('/{pharmacy}', [MangePharmacy::class, 'show'])->name('admin.pharmacy.show'); // show pharmacy profile

            Route::get('/active/{pharmacy}', [MangePharmacy::class, 'active'])->name('admin.pharmacy.active');

            Route::get('/disActive/{pharmacy}', [MangePharmacy::class, 'disActive'])->name('admin.pharmacy.disActive');

            Route::post('/check/{id?}', [MangePharmacy::class, 'checkPharmacy'])->name('admin.check.pharmacy');
        });

        /////////////////////////////////////// end pharmacy

    }); // end dashboard

    // pharmacy crud start
    Route::group(['prefix' => 'pharmacy', 'middleware' => ['checkType:pharmacy']], function () {
        Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.home');

        Route::get('/create', [PharmacyController::class, 'create'])->name('pharmacy.create');

        Route::post('/store', [PharmacyController::class, 'store'])->name('pharmacy.store');

        Route::get('/edit', [PharmacyController::class, 'edit'])->name('pharmacy.edit');

        Route::post('/update', [PharmacyController::class, 'update'])->name('pharmacy.update');
    }); // pharmacy crud end


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [UserProfileController::class, 'index'])->name('profile');

        Route::get('index', [UserProfileController::class, 'show'])->name('index.profile');

        Route::get('edit', [UserProfileController::class, 'edit'])->name('edit.profile');

        Route::post('update', [UserProfileController::class, 'update'])->name('update.profile');
    });
});



// start const route
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/partners', function () {
    return view('partner');
})->name('partners');

// main page site
Route::get('/', [MedicalController::class, 'index'])->name('index');

Route::get('/pharmacies', [MedicalController::class, 'pharmacies'])->name('morePharmacy'); // show all pharmacies

