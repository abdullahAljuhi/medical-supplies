<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Advertisement;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Pharmacy;
use App\Http\Requests\PharmacyRequest;
use App\Helpers\Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // this check if user is admin
        if(Auth::user()->admin()){

            //  this rout for admin/
            return redirect(RouteServiceProvider::ADMIN);

        }else if(Auth::user()->pharmacyType()){

                //  this rout for pharmacy/
            return redirect(RouteServiceProvider::PHARMACY);

        }else{
            $advertisements= Advertisement::all();
            $pharmacies = Pharmacy::all();
            return view('index',compact('advertisements','pharmacies'));
        
        }
    }
}
