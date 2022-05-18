<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PharmacyRequest;
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

    public function users()
    {
        $users = User::latest()->where('id', '<>', auth()->id())->get();

        $types = ['مستخدم', 'مدير', 'صيدلية'];

        return view('user.users', compact('users', 'types'));
    }

    // get all orders for user auth
    public function orders()
    {
        $type = [['جديد','قيد الانتظار','مكتمل','غير متوفر','مرفوض','مسترجع'],['primary','warning','success','secondary','danger','orange']];
        $route = 'admin.order';
        try {
            $orders = Order::with('user', 'pharmacy')->get();
            return view('order.index', compact('orders','type','route'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function order($id)
    {
        try {

            $order = Order::with('pharmacy', 'user')->find($id);

            if ($order) {
                $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);
                if ($order->status == 0) {
                    return redirect()->back();
                } else {
                    return view('order.bill-text', compact('order', 'products'));
                }
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
