<?php

namespace App\Http\Controllers;

use App\Http\Requests\GovernorateRequest;
use App\Models\Governorate;

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
                return redirect()->back()->with(['error' => 'هذه الحافظه غير موجوده']);

            $governorate->name = $request->name;
            $governorate->save();
            $governorates = Governorate::all();
        return view('admin.state',compact('governorates'));
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function active($id){
        try {
            $governorate = Governorate::find($id);
            $acti=$governorate->is_active ;
          
            if($acti == 0)
            {
               $acti=1;
 
            }else{
             $acti=0;
            }
         
            $governorate->is_active=$acti;
 
         
            $governorate->save();
            return redirect()->back();
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
