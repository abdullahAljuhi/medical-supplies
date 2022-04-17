<?php

namespace App\Http\Controllers\pharmacyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class PharmacyLoginController extends Controller
{

    public function  getPharmacyLogin(){

        return view('pharmacy.auth.login');
    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('pharmacy')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            //
            return redirect() -> route('pharmacy.dashboard')->with(['success'=>"تم الدخول بنجاح"]);
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
}
