<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Advertisement;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\PharmacyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPharmacies(PharmacyRequest $request)
    {
        try {
            $pharmacies = DB::table('pharmacies')
            ->join('addresses', 'pharmacies.id', '=', 'addresses.pharmacy_id')
            ->join('users', 'users.id', '=', 'pharmacies.user_id')
            ->join('governorates', 'governorates.id', '=', 'addresses.governorate_id')
            ->join('cities', 'cities.id', '=', 'addresses.city_id')
            ->select('pharmacies.*', 'addresses.*','cities.name as city_name','cities.governorate_id as gId','governorates.name as governorate_name')
                ->when($request->search, function ($q) use ($request) {
                    return $q->where('pharmacy_name', 'like', '%' . $request->name . '%');
                })
                ->when($request->city, function ($q) use ($request)  {
                    return $q->where('city_id', $request->city);
                })
                ->get();
               
                $pharmacies= $pharmacies->where('governorate_id',$request->governorate);
            return view('pharmacies', ['pharmacies' => $pharmacies]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
    }

    public function index(Request $request)
    {
        try {
            $pharmacies = Pharmacy::all();
            $advertisements= Advertisement::all();

            return view('index', ['pharmacies' => $pharmacies,'advertisements'=>$advertisements]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
    }
    public function pharmacies(PharmacyRequest $request)
    {
        try {
            $pharmacies = Pharmacy::all();
        
            return view('pharmacies', ['pharmacies' => $pharmacies]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
    }
}
