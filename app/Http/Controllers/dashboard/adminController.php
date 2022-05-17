<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    // get all orders for user auth
    public function orders()
    {
        try {

            $user = User::with('pharmacy')->find(Auth::id());

                $orders = Order::all();

            if ($orders) {

                return $orders;
            } else {
                // return view('order.list');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function order($id)
    {
        try {

            $order = Order::with('pharmacy','user')->find($id);

            if ($order) {
                return view('order.list');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
