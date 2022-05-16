<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\dashboard\adminController;
use App\Http\Controllers\dashboard\PharmacyController as MangePharmacy;
use App\Http\Controllers\PaymentController;

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
            Route::get('/', [adminController::class, 'users'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
            // start profile
            Route::group(['prefix' => 'profile'], function () {
                Route::get('/{id}', [UserProfileController::class, 'show'])->name('show.profile');
            }); // end show user profile

        }); // end users


        //crud advertisement
        Route::group(['prefix' => 'advertisement'], function () {
            Route::get('/index', [AdvertisementController::class, 'index'])->name('show.adv');
            Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('edit.adv');
            Route::post('/update/{id}', [AdvertisementController::class, 'update'])->name('update.adv');
            Route::post('/save', [AdvertisementController::class, 'store'])->name('save.adv');
            Route::get('/add', [AdvertisementController::class, 'create'])->name('add.adv');
            Route::get('/active/{adv}', [AdvertisementController::class, 'active'])->name('active.adv');
            Route::get('/disActive/{adv}', [AdvertisementController::class, 'disActive'])->name('disActive.adv');

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


       //crud order
            Route::group(['prefix'=>'order'],function(){
                Route::post('/send',[OrderController::class,'send'])->name('send');
                Route::get('/create/{pharmacy}',[OrderController::class,'create'])->name('order');
                Route::get('/edit/{id?}',[OrderController::class,'edit'])->name('order.edit');
                Route::get('/show',[OrderController::class,'show'])->name('bill');
                Route::post('/update/{id}',[OrderController::class,'update'])->name('order.store');
                Route::get('/bill/{id?}',[OrderController::class,'Bill'])->name('order.userBill');
            });  
            Route::get('/orders', [UserController::class, 'orders'])->name('use.orders');


});


    });
});


// });
// main page
// Route::get('/', function () {return view('index');})->middleware('guest');
Route::get('/', function () {
    return view('order.order');
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

Route::get('/pharmacies', [MedicalController::class, 'showPharmacies'])->name('morePharmacy'); // show all pharmacies

Route::get('test', [PaymentController::class, 'index'])->name('test');
Route::get('t/{id}', [PaymentController::class, 't']);


Route::get('/test/response/{info}',function(){
    $info = Route::current()->parameter('info');
   
    $info=base64_decode($info);
    $data= $arrayFormat=json_decode($info,true);
    return $data;
});
// http://127.0.0.1:8000/test/responsetest