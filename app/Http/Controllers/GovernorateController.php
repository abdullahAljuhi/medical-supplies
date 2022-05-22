<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GovernorateRequest;
use App\Models\Governorate;
use App\Http\Requests\CityRequest;
use App\Models\City;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pharmacy.governorate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.state',compact('governorates'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernorateRequest $request)
    {
        try {
            $governorate = new Governorate();
            $governorate->name = $request->name;
            $governorate->save();
            return redirect()->back()->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $governorate = Governorate::find($id);

            // check if governorate is exist
            if (!$governorate)
                return redirect()->back()->with(['error' => 'هذه الحافظه غير موجوده']);

            return view('admin.editState', ['governorate' => $governorate]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(GovernorateRequest $request, $id)
    {
        try {

            $governorate = Governorate::find($id);

            // check if governorate is exist
            if (!$governorate)
                return redirect()->back()->with(['error' => 'هذه المحافظه غير موجوده']);

            $governorate->name = $request->name;
            $governorate->save();
        return view('admin.state')->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function active($id){
        try {
            $governorate = Governorate::with("cities")->find($id);
            // $active=$governorate->is_active ;
          
            if( $governorate->is_active == 0)
            {
               $governorate->is_active=1;
 
            }else{
                $governorate->is_active=0;
             foreach ($governorate->cities as  $city) {
                 $city->is_active =0;
                 $city->save();
             }
             

            }
          
         
            $governorate->save();

            return redirect()->back()->with(['success' => 'تمت العمليه  بنجاح']);
    
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $governorate = Governorate::find($id);

            if (!$governorate)
                return redirect()->back()->with(['error' => 'هذه الحافظه غير موجوده']);

            $governorate->delete();

            return redirect()->route('governorate.all')->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
