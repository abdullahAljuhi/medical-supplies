<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::orderBy('id', 'desc')->get();
        return view('pharmacy.governorate.index')
            ->with('governorates', $governorates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $governorate = new Governorate();
            $governorate->name = $request->name;
            $governorate->save();
            return redirect()->route('governorate.all')->with(['success' => 'تم  الاضافه بنجاح']);
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

            return view('pharmacy.governorate.edit', ['governorate' => $governorate]);
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
    public function update(Request $request, $id)
    {
        try {

            $governorate = Governorate::find($id);

            // check if governorate is exist
            if (!$governorate)
                return redirect()->back()->with(['error' => 'هذه الحافظه غير موجوده']);

            $governorate->name = $request->name;
            $governorate->save();
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
