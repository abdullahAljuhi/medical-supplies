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
        return view('pharmacy.profile')->withPharmacy($pharmacy);
    }
    // active pharmacy
    public function active(Pharmacy $pharmacy)
    {
        $pharmacy->is_active = 1;
        $pharmacy->save();

        // send email to user pharmacy 
        Notification::send($pharmacy->user, new ActivePharmacy());

        return redirect()->back();
    }

    // dis_active pharmacy
    public function disActive(Pharmacy $pharmacy)
    {
        $pharmacy->is_active = 0;
        $pharmacy->save();
        return redirect()->back();
    }

    public function checkPharmacy(PharmacyRequest $request, $id = '')
    {
        if ($id == '') {
            $id = $request->pharmacy;
        }
        $pharmacy = Pharmacy::find($id);
        $pharmacy->check = 1;
        $pharmacy->save();
        return redirect()->route('admin.pharmacy.show', $pharmacy->id);
    }
}
