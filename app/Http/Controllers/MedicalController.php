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
     * 
     * this function usee to do filter for pharmacies
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
                    if ($request->name == '')
                        return '';
                    return $q->where('pharmacy_name', 'like', '%' . $request->name . '%');
                })->get();

            $pharmacies =  $pharmacies->when($request->governorate, function ($q) use ($request) {
                if ($request->governorate == 0)
                    return '';
                return $q->where('governorate_id', $request->governorate);
            })->when($request->city, function ($q) use ($request) {
                    if ($request->city == 0)
                        return '';
                    return $q->where('city_id', $request->city);
            })->where('is_active', '1')->where('pharmacies.user_id','!=',Auth::user()->id);


            return view('pharmacies', ['pharmacies' => $pharmacies]);

        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // this to show main page of site 
    public function index(Request $request)
    {
        try {

            // // get only 6 pharmacy without current pharmacy
            $pharmacies = Pharmacy::where('is_active', '1')
            ->limit(6)->get();
            if(Auth::id()){
                $pharmacies = Pharmacy::where('is_active', '1')
                ->where('pharmacies.user_id','!=',Auth::user()->id)
                ->limit(6)->get();
            }
            $advertisements = Advertisement::where('is_active', '1')->limit(6)->get();


            return view('index', ['pharmacies' => $pharmacies, 'advertisements' => $advertisements]);

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
    public function OrderNotification()
    {

        $q = Order::with(['user' => function ($q) {
            return $q->where('id', Auth::id());
        }], 'pharmacy')->where('status', 1);

        $orders = $q->limit(6)->get();

        $count = $q->count();

        return ['orders' => $orders, 'count' => $count];
    }


    // // filter by get near pharmacy from user user
    public function getNearPharmacy(Request $request){

        $pharmacies=Pharmacy::select(DB::raw("id, ( 3959 * acos( cos( radians('$request->lat') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('$request->long') ) + sin( radians('$request->lat') ) * sin( radians( lat ) ) ) ) AS distance"))
        ->havingRaw('distance < 1')->orderBy('distance')
        ->where('is_active', '1')->get();
    }
}
