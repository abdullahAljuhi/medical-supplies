<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $pharmacies = DB::table('pharmacies')
            ->join('addresses', 'pharmacies.id', '=', 'addresses.pharmacy_id')
            ->join('users', 'users.id', '=', 'pharmacies.user_id')
            ->join('cities', 'cities.id', '=', 'addresses.city_id')
            ->join('governorates', 'governorates.id', '=', 'addresses.governorate_id')
            ->select('pharmacies.*', 'addresses.*','cities.name as city_name','governorates.name as governorate_name')
                ->when($request->search, function ($q) use ($request) {
                    return $q->where('pharmacy_name', 'like', '%' . $request->name . '%');
                })
                ->when($request->city, function ($q) use ($request)  {
                    return $q->where('city_id', $request->city);
                })->when($request->city, function ($q) use ($request)  {
                    return $q->where('city_id', $request->city);
                }, function ($query) {
                })->get();
            return view('pharmacy', ['pharmacies' => $pharmacies]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    
    }
}
