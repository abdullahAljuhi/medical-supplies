<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\Advertisement;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\PharmacyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPharmacies(Request $request)
    {
        try {
            $pharmacies = DB::table('pharmacies')
                ->join('addresses', 'pharmacies.id', '=', 'addresses.pharmacy_id')
                ->join('users', 'users.id', '=', 'pharmacies.user_id')
                ->join('governorates', 'governorates.id', '=', 'addresses.governorate_id')
                ->join('cities', 'cities.id', '=', 'addresses.city_id')
                ->select('pharmacies.*', 'addresses.*', 'cities.name as city_name', 'cities.governorate_id as gId', 'governorates.name as governorate_name')
                ->when($request->name, function ($q) use ($request) {
                    if($request->name=='')
                    return '';
                    return $q->where('pharmacy_name', 'like', '%' . $request->name . '%');
                })->get();
                
                $pharmacies =  $pharmacies->when($request->governorate, function ($q) use ($request) {
                    if ($request->governorate == 0)
                        return '';
                    return $q->where('governorate_id', $request->governorate);
                })
                ->when($request->city, function ($q) use ($request) {
                    if ($request->city == 0)
                    return '';
                    return $q->where('city_id', $request->city);
                })->where('is_active','1');
                


            return view('pharmacies', ['pharmacies' => $pharmacies]);
        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function index(Request $request)
    {
        try {

            $pharmacies = Pharmacy::where('is_active','1')->limit(6)->get();
            $advertisements= Advertisement::where('is_active','1')->limit(6)->get();


            return view('index', ['pharmacies' => $pharmacies,'advertisements'=>$advertisements]);

        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }



    public function pharmacies(Request $request)
    {
        try {
            $pharmacies = Pharmacy::all();

            return view('pharmacies', ['pharmacies' => $pharmacies]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

       // show orders that for pharmacy 
       public function OrderNotification(){

        $q = Order::with(['user' => function ($q) {
            return $q->where('id', Auth::id());

        }], 'pharmacy')->where('status', 1);

        $orders=$q->limit(6)->get();

        $count=$q->count();
        // return  $count;
        return ['orders'=>$orders,'count'=>$count];
    
    }
}
