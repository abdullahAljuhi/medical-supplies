<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Models\Governorate;
use App\Http\Requests\GovernorateRequest;

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

            return redirect()->back()->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Exception $e) {
            return $e->getMessage();
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

            $city = City::with("Governorate")->find($id);
            $active=$city->is_active ;
          
             $governorate = Governorate::find($id);
             $activegov=$governorate->is_active ;

            //$city->Governorate =  $city
            if($activegov==0)
            {
                return redirect()->back()->with(['error' => 'يرجى تفعيل المحافظة أولاً']);

            }else{
            if($active == 0)
            {
               $active=1;
 
            }else{
             $active=0;
            }
        }
            $city->is_active=$active;
 
         
            $city->save();
            
            // $governorates = Governorate::all();
            // $cities = City::with('governorate')->get();
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
