<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        View::share(['governorates'=> $governorates,'cities'=>$cities]);
    }
}
