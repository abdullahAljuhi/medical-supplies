<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index',['contacts'=> $contacts]);
    }


    public function create()
    {
        return view('contact.create');
    }


    public function store(Request $request)
    {
        try {
            $contact = new Contact();
            $contact->facebook = $request->facebook;
            $contact->twitter = $request->twitter;
            $contact->instagram = $request->instagram;
            $contact->user_id = Auth::user()->id();
            $contact->save();

            return redirect()->route('contacts.all')->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    public function edit($id)
    {
        try {

            $contact = Contact::findOrFail($id);

            // check if contact is exist
            if (!$contact)
                return redirect()->back()->with(['error' => 'غير موجوده']);
                

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function update(Request $request, $id)
    {
        try {

            $contact = Contact::find($id);

            // check if contact is exist
            if (!$contact)
                return redirect()->back()->with(['error' => 'هذاالعنصر غير موجود']);

                $contact->facebook = $request->facebook;
                $contact->twitter = $request->twitter;
                $contact->instagram = $request->instagram;
                $contact->user_id = Auth::user()->id();
                $contact->save();

            $contact->save();
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

   
    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);

            if (!$contact)
                return redirect()->back()->with(['error' => 'هذا العنصر غير موجود']);

            $contact->delete();

            return redirect()->back()->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
