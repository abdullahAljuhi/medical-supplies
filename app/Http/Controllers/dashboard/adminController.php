<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index()
    {
        try {
            $pharmacies = Pharmacy::where('check', 0)->get();

            return view('home')->withPharmacies($pharmacies);


        } catch (\Exception $e) {
            return $e->getMessage();
            //throw $th;
        }
    }
    public function pharmacies()
    {
        try {
            $pharmacies = Pharmacy::all();
            return view('pharmacy.pharmacies')->withPharmacies($pharmacies);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function users(){
        $users = User::latest()->where('id', '<>', auth()->id())->get();

        $types = ['مستخدم','مدير','صيدلية'];

        return view('user.users', compact('users','types'));
    }
}
