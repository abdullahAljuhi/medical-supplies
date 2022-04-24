<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PharmacyRequest;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $pharmacies = Pharmacy::with('address')->when($request->search, function ($q) use ($request) {
                return $q->where('name', '%' . $request->search . '%');
            })->when($request->city_id, function ($q) use ($request) { // filter by city
                return $q->where('city_id', $request->city_id);
            })->when($request->governorate_id, function ($q) use ($request) { // filter by governorate
                return $q->where('governorate_id', $request->governorate_id);
            })->paginate(5);

            return view('Pharmacy.index', ['pharmacies' => $pharmacies]);
            //code...
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
        $cities = City::all();

        $governorates = Governorate::all();

        return view('pharmacy.create', compact('cities', 'governorates'));
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
                'user_id' => $request['user_id'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'image' => $fileName,
                'fax' => $request['fax'],
                'license' => $request['license'],
                'description' => $request['description'],
            ]);



            // add address to pharmacy
            $address = $pharmacy->address()->create([
                'city_id' => $request['city_id'],
                'governorate_id' => $request['governorate_id'],
                'street' => $request['street'],
                'details' => $request['details'],
                'user_id' => $request['user_id'],
            ]);


            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();


            DB::commit();
            return redirect()->route('pharmacy.home');
        } catch (\Exception $ex) {


            // return  insert date

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

        return view('pharmacy.profile')->withPharmacy($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $pharmacy = Pharmacy::findOrFail($id);

            if ($pharmacy == '') {
                return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
            $pharmacy = $pharmacy->with('addresses')->get();

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
    public function update(PharmacyRequest $request, $id)
    {

        // PharmacyRequest request with validation

        try {


            // start transaction
            DB::beginTransaction();

            $pharmacy = Pharmacy::findOrFail($id);

            $fileName = $pharmacy->image;

            if ($request->has('image')) {

                Storage::disk('pharmacy')->delete($fileName);

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacy', $request->image);
            }

            // create pharmacy
            $pharmacy->update([
                'name' => $request['name'],
                'user_id' => $request['user_id'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'image' => $fileName,
                'fax' => $request['fax'],
                'license' => $request['license'],
                'description' => $request['description'],
            ]);

            // add address to pharmacy
            $address = $pharmacy->address()->update([
                'city_id' => $request['city_id'],
                'governorate_id' => $request['governorate_id'],
                'street' => $request['street'],
                'details' => $request['details'],
                'user_id' => $request['user_id'],
            ]);


            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();


            DB::commit();
            return redirect()->route('pharmacy.home');
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
                Storage::disk('pharmacy')->delete($pharmacy->image);
            }

            $pharmacy->delete();
            return redirect()->route('pharmacy.home');
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
