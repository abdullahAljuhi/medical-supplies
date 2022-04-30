<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

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
            $pharmacies = Pharmacy::with(['address','user'])->when($request->search, function ($q) use ($request) {
                return $q->where('name', '%' . $request->search . '%');
            })->when($request->city_id, function ($q) use ($request) { // filter by city
                return $q->where('city_id', $request->city_id);
            })->when($request->governorate_id, function ($q) use ($request) { // filter by governorate
                return $q->where('governorate_id', $request->governorate_id);
            })->paginate(5);
            // return $pharmacies;
            return view('pharmacy.pharmacies', ['pharmacies' => $pharmacies]);
            //code...
        } catch (\Exception $e) {
            return $e->getMessage();
            //throw $th;
        }
    }
}
