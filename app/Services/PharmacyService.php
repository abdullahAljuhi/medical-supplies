<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Pharmacy;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PharmacyService.
 */
class PharmacyService
{
    use Helper;

    public  function store($request)
    {
        // PharmacyRequest request with validation

        try {

            // start transaction
            DB::beginTransaction();

            $fileName = "";

            if (isset($data['image'])){

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacy', $request->photo);
            }

            // create pharmacy
            $pharmacy = Pharmacy::create([
                'name' => $request['name'],
                'user_id' => $request['user_id']??'5',
                'mobile' => $request['mobile']??'',
                'phone' => $request['phone']??'',
                'image' => $fileName??'',
                'fax' => $request['fax']??'',
                'license' => $request['license'],
                'description' => $request['description']??'',
            ]);



            // // add address to pharmacy
            // $address = $pharmacy->address()->create([
            //     'city_id' => $request['city_id'],
            //     'governorate_id' => $request['governorate_id'],
            //     'street' => $request['street'],
            //     'details' => $request['details'],
            //     'user_id' => $request['user_id'],
            // ]);


            // if (isset($request['lat'])) {

            //     $address->lat = $request['lat'];
            //     $address->lang = $request['lang'];
            // }
            // $address->save();


            DB::commit();
            return redirect()->route('pharmacy.home');
        } catch (\Exception $ex) {


            // return  insert date

            DB::rollback();
            return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
