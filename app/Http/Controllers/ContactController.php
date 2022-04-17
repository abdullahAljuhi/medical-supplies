<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('contact.index',['cities'=> $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
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
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->url = $request->url;
            $contact->pharmacy_id=Auth::guard('pharmacy')->id();
            $contact->save();

            return redirect()->route('city.all')->with(['success' => 'تم  الاضافه بنجاح']);
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

            $contact = Contact::find($id);

            // check if contact is exist
            if (!$contact)
                return redirect()->back()->with(['error' => 'غير موجوده']);

            return view('City.edit', ['contact' => $contact]);
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

            $contact = Contact::find($id);

            // check if contact is exist
            if (!$contact)
                return redirect()->back()->with(['error' => 'هذاالعنصر غير موجود']);

            $contact->name = $request->name;
            $contact->url = $request->url;

            $contact->save();
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
            $contact = Contact::find($id);

            if (!$contact)
                return redirect()->back()->with(['error' => 'هذا العنصر غير موجود']);

            $contact->delete();

            return redirect()->route('governorate.all')->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
