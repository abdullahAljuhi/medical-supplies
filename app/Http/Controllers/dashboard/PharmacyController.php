<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Requests\pharmacyRequest;
use App\Http\Controllers\Controller;
use App\Notifications\ActivePharmacy;
use Illuminate\Support\Facades\Notification;

class PharmacyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        // this mean admin is show the pharmacy
        $pharmacy->check = 1;

        $pharmacy->save();

        return view('pharmacy.profile')->withPharmacy($pharmacy);
    }
    // active pharmacy
    public function active(Pharmacy $pharmacy)
    {
        try {

            $pharmacy->is_active = 1;
            
            $pharmacy->save();
    
            // send email to user pharmacy 
            Notification::send($pharmacy->user, new ActivePharmacy());
    
            return redirect()->back();
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // dis_active pharmacy
    public function disActive(Pharmacy $pharmacy)
    {
        try {
            
            $pharmacy->is_active = 0;
            $pharmacy->save();
            return redirect()->back();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // this to change pharmacy check (admin show this pharmacy)
    public function checkPharmacy(Request $request, $id = '')
    {
        try {

            if ($id == '') {
                $id = $request->pharmacy;
            }
            $pharmacy = Pharmacy::find($id);
            $pharmacy->check = 1;
    
            $pharmacy->save();
            
            //
            return redirect()->route('admin.pharmacy.show', $pharmacy->id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
