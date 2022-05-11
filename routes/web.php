<?php

ususe App\Http\Controllers\PostController;
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


Route::get('/',[PostController::class,'index']);

<<<<<<< HEAD
    // Route::get('/', [PharmacyController::class, 'index'])->name('admin.pharmacy.index');

    // change password
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword.user');

    // admin
    Route::group(['prefix' => 'dashboard', 'middleware' => 'checkType:admin'], function () {
        Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

        // dashboard
        // Route::get('/',);
        //  function () {
            // return view('home');})->name('dashboard');

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
            Route::get('/index',[AdvertisementController::class,'index'])->name('show.adv');
            Route::get('/edit/{id}',[AdvertisementController::class,'edit'])->name('edit.adv');
            Route::post('/update/{id}',[AdvertisementController::class,'update'])->name('update.adv');
            Route::post('/save',[AdvertisementController::class,'store'])->name('save.adv');
            Route::get('/add',[AdvertisementController::class,'create'])->name('add.adv');
            Route::get('/active/{adv}', [AdvertisementController::class, 'active'])->name('active.adv');
            Route::get('/disActive/{adv}', [AdvertisementController::class, 'disActive'])->name('disActive.adv');

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
        Route::post('/check/{id?}', [dashboardController::class, 'checkPharmacy'])->name('admin.check.pharmacy');

    });

    /////////////////////////////////////// end pharmacy

    });
        // pharmacy crud start
        Route::group(['prefix' => 'pharmacy', 'middleware' => ['checkType:pharmacy']], function () {
            Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.index');
            Route::get('/create', [PharmacyController::class, 'create'])->name('pharmacy.create');
            // Route::post('/store', [PharmacyController::class, 'store'])->name('pharmacy.store');
            Route::get('/edit/{pharmacy}', [PharmacyController::class, 'edit'])->name('admin.pharmacy.edit');
            // Route::post('/update/{pharmacy}', [PharmacyController::class, 'update'])->name('pharmacy.update');

        });// pharmacy crud end

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [UserProfileController::class, 'index'])->name('profile');
        Route::get('index', [UserProfileController::class, 'show'])->name('index.profile');
        Route::get('edit', [UserProfileController::class, 'edit'])->name('edit.profile');
        Route::post('update', [UserProfileController::class, 'update'])->name('update.profile');
    });

    // Route::group(['prefix' => 'pharmacy', 'middleware' => ['checkType:pharmacy']], function () {
        Route::get('pharmacy/', [PharmacyController::class, 'index'])->name('pharmacy.index');
        Route::get('pharmacy/create', [PharmacyController::class, 'create'])->name('pharmacy.create');
        Route::post('pharmacy/store', [PharmacyController::class, 'store'])->name('admin.pharmacy.store');
=======
Route::get('/create',function(){
return view('create');
>>>>>>> e533e22f4337346a488a59f6479d707a1b483501
});

Route::post('/post',[PostController::class,'store']);
Route::delete('/delete/{id}',[PostController::class,'destroy']);
Route::get('/edit/{id}',[PostController::class,'edit']);

<<<<<<< HEAD
// });
// main page
// Route::get('/', function () {return view('index');})->middleware('guest');
Route::get('/', function () {return view('order.order');});
=======
Route::delete('/deleteimage/{id}',[PostController::class,'deleteimage']);
Route::delete('/deletecover/{id}',[PostController::class,'deletecover']);
>>>>>>> e533e22f4337346a488a59f6479d707a1b483501

Route::put('/update/{id}',[PostController::class,'update']);


