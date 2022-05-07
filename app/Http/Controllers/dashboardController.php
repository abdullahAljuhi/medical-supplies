<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        try {
            $pharmacies = Pharmacy::where('check', 0)->get();
            // return $pharmacies;
                    return view('home')->withPharmacies($pharmacies);
            

        } catch (\Exception $e) {
            return $e->getMessage();
            //throw $th;
        }
    }
    public function checkPharmacy(Request $request,$id ='')
    {
            if($id==''){
                $id=$request->pharmacy;
            }
            $pharmacy=Pharmacy::find($id);
            $pharmacy->check=1;
            $pharmacy->save();
            return redirect()->route('admin.pharmacy.show',$pharmacy->id);
    }
}
