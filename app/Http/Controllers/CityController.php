<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Models\Governorate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $cities=City::all();

            return view('city.index',['cities'=>$cities]);

        } catch (\Throwable $th) {
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
        $governorates = Governorate::all();

        $cities = City::with('governorate')->get();

        return view('admin.city',['cities'=>$cities, 'governorates'=>$governorates]);
    }


    public function store(CityRequest $request)
    {
        try {

            $city = new City();
            $city->name = $request->name;
            $city->governorate_id = $request->governorate;
            $city->save();

            return redirect()->route('city.all')->with(['success' => 'تم  الاضافه بنجاح']);

        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    public function edit($id)
     {//return $id;
        try {
            $city = City::findOrFail($id);
           
            // check if city is exist
            if (!$city)
                return redirect()->back()->with(['error' => 'هذه المدينه غير موجوده']);

            return view('admin.editCity', ['city' => $city]);
        } catch (\Exception $ex) {
            
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function update(CityRequest $request, $id)
    {
        try {

            $city = City::findOrFail($id);

            // check if governorate is exist
            if (!$city)
                return redirect()->back()->with(['error' => 'هذه المدينه غير موجوده']);

            $city->name = $request->name;
            $city->governorate_id = $request->governorate;
            $city->save();

            $governorates = Governorate::all();
            $cities = City::with('governorate')->get();
            return view('admin.city',['cities'=>$cities, 'governorates'=>$governorates]);
        
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function active($id){
        try {
            $city = City::find($id);
            $acti=$city->is_active ;
          
            if($acti == 0)
            {
               $acti=1;
 
            }else{
             $acti=0;
            }
         
            $city->is_active=$acti;
 
         
            $city->save();
            
            $governorates = Governorate::all();
            $cities = City::with('governorate')->get();
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {
        try {
            $city = City::find($id);

            if (!$city)
                return redirect()->back()->with(['error' => 'هذه المدينه غير موجوده']);

            $city->delete();

            return redirect()->back()->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
