<?php

namespace App\Http\Controllers;

use App\Events\notfiy;
use App\Helpers\Helper;
use App\Models\City;
use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PharmacyRequest;
use App\Notifications\ActivePharmacy;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pharmacy = Pharmacy::where('user_id', Auth::id())->first();
            // dd($pharmacy);
            if (empty($pharmacy)) {
                return redirect()->route('pharmacy.create');
            } else {
                if ($pharmacy->is_active == '1') {
                    return view('pharmacy.index');
                } else {
        
                    event(new notfiy($pharmacy));
                    return "await to agree your request";

                }
            }
            // $user->pharmacy['license'];

        } catch (\Exception $e) {
            return $e->getMessage();
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pharmacy = Pharmacy::where('user_id', Auth::id())->first();
        // dd($pharmacy);
        if (empty($pharmacy)) {
            
            $cities = City::all();

            $governorates = Governorate::all();

            return view('auth.registerNext', compact('cities', 'governorates'));
        } else {
            return redirect('/pharmacy');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePharmacyRequest  $request
     * @return \Illuminate\Http\Response
     */
    // PharmacyRequest
    public function store(Request $request)
    {
        // PharmacyRequest request with validation

        try {

            // start transaction
            DB::beginTransaction();

            $fileName = "";

            if ($request->has('image')) {

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacy', $request->photo);
            }

            // create pharmacy
            $pharmacy = Pharmacy::create([
                'name' => $request['name'],
                'user_id' => Auth::id(),
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'image' => $fileName,
                'fax' => $request['fax'],
                'license' => $request['license'],
                'description' => $request['description'],
            ]);



            // add address to pharmacy
            $address = $pharmacy->address()->create([
                'city_id' => $request['city'],
                'governorate_id' => $request['state'],
                'street' => $request['description'],
                'details' => $request['details'],
            ]);


            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();


            DB::commit();
            event(new notfiy($pharmacy));
            return redirect()->route('home');
        } catch (\Exception $ex) {


            // 
            DB::rollback();
            return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {

        return view('pharmacy-profile')->withPharmacy($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        try {
            if ($pharmacy == '') {
                return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
            return view('pharmacy.edit')->withPharmacy($pharmacy);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePharmacyRequest  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacy $pharmacy)
    {

        // PharmacyRequest request with validation

        try {


            // start transaction
            DB::beginTransaction();

            $fileName = $pharmacy->image;

            if ($request->has('image')) {
                if($fileName != null){
                    $fileName = public_path('assets/images/pharmacies/'.$fileName);
                    unlink(realpath($fileName));
                }

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacy', $request->image);
            }
            // create pharmacy
            $pharmacy->update([
                'name' => $request['name'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'image' => $fileName,
                'fax' => $request['fax'],
                // 'license' => $request['license'],
                'description' => $request['description'],
            ]);
            
            // add address to pharmacy
            $address = $pharmacy->address()->update([
                'city_id' => $request['city'],
                'governorate_id' => $request['governorate'],
                'street' => $request['street'],
                'details' => $request['details'],
            ]);
            
            $address = $pharmacy->contact()->updateOrCreate([
                'twitter' => $request['twitter'],
                'facebook' => $request['facebook'],
                'instagram' => $request['instagram'],
            ]);
            
            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();


            DB::commit();
            return redirect()->route('pharmacy.index');
        } catch (\Exception $ex) {

            // return  insert date

            DB::rollback();
            return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pharmacy = Pharmacy::findOrFail($id);
            if ($pharmacy->image !== '') { // check if pharmacy has image
                // remove image
                $fileName=public_path('assets/images/pharmacies/'.$pharmacy->image);
                unlink(realpath($fileName));
            }

            $pharmacy->delete();
            return redirect()->route('pharmacy.home');
        } catch (\Exception $e) {
            //throw $th;
        }
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
}
