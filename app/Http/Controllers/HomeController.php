<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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

        }else if(Auth::user()->pharmacy()){

                //  this rout for pharmacy/
            return redirect(RouteServiceProvider::PHARMACY);

        }else{
            return view('home');
        }
    }
}
