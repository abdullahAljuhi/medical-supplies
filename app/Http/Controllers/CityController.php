<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        return view('city.index',['cities'=>$cities]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city');
    }


    public function store(CityRequest $request)
    {
        try {
            $city = new City();
            $city->name = $request->name;
            $city->save();
            return redirect()->route('city.all')->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    public function edit($id)
    {
        try {

            $city = City::findOrFail($id);

            // check if city is exist
            if (!$city)
                return redirect()->back()->with(['error' => 'هذه المدينه غير موجوده']);

            return view('City.edit', ['City' => $city]);
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
            $city->save();
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
