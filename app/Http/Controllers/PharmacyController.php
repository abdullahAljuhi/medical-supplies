<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Events\notfiy;
use App\Helpers\Helper;
use App\Models\Pharmacy;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ActivePharmacy;

use App\Http\Requests\PharmacyRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GovernorateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class PharmacyController extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pharmacy = Pharmacy::where('user_id', Auth::id())->first();

            if (empty($pharmacy)) {
                return redirect()->route('pharmacy.create');
            } else {
                if ($pharmacy->is_active == '1') {


                    return view('pharmacy.home');

                } else {
                    // event(new notfiy($pharmacy));
                    return view('auth.verifyPharmacy');
                }
            }
            // $user->pharmacy['license'];

        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pharmacy = Pharmacy::where('user_id', Auth::id())->first();

        if (empty($pharmacy)) {
            return view('registerAsPhar');
        } else {
            return redirect()->route('pharmacy.home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePharmacyRequest $request
     * @return \Illuminate\Http\Response
     */
    // PharmacyRequest
    public function store(PharmacyRequest $request)
    {
        // PharmacyRequest request with validation

        try {
            $request->validate([]);
            $request->validate([
                'license' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
              ],
              [
                'license.required'=>'هذا الحقل مطلوب',
                'license.image'=>' يجب ان يكون صوره',
              ]);
            // return $request;
            // Validator:
            // 'license'=>'required',
            // 'license.required'=>'عليك إدخال الترخيص',

            // start transaction
            DB::beginTransaction();

            $fileName = "";

            if ($request->has('license')) {
                //  store licenses in public/images/pharmacies/licenses
                $fileName = $this->uploadImage('licenses', $request->license);
            }

            // create pharmacy
            $pharmacy = Pharmacy::create([
                'pharmacy_name' => $request['pharmacy_name'],
                'user_id' => Auth::id(),
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'license' => $fileName,
                'fax' => $request['fax'],
                'license' => $fileName,
                'description' => $request['description'],
            ]);


            // add address to pharmacy
            $address = $pharmacy->address()->create([
                'city_id' => $request['city'],
                'governorate_id' => $request['governorate'],
                'street' => $request['street'],
                'details' => $request['details'],
            ]);


            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();
            DB::commit();

            event(new notfiy($pharmacy));

            return redirect()->route('pharmacy.home');
        } catch (\Exception $ex) {

            //
            DB::rollback();
            return $ex->getMessage();
            return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    // Pharmacy $pharmacy
    public function edit()
    {
        $pharmacy = Pharmacy::where('user_id', '=', Auth::user()->id)->first();
        try {
            if ($pharmacy == '') {
                return $pharmacy;
            }
            return view('pharmacy-profile')->withPharmacy($pharmacy);

        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePharmacyRequest $request
     * @param \App\Models\Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacyRequest $request)
    {

        // PharmacyRequest request with validation

        try {

            $pharmacy = Pharmacy::where('user_id', Auth::user()->id)->first();

            // start transaction
            DB::beginTransaction();

            $fileName = $pharmacy->image;

            if ($request->has('image')) {
                if ($fileName != null) {
                    $fileName = public_path('assets/images/pharmacies/' . $fileName);
                    unlink(realpath($fileName));
                }

                // save img in public/pharmacy/images
                $fileName = $this->uploadImage('pharmacies', $request->image);
            }
            // create pharmacy
            $pharmacy->update([
                'pharmacy_name' => $request['pharmacy_name'],
                'mobile' => $request['mobile'],
                'phone' => $request['phone'],
                'image' => $fileName,
                'fax' => $request['fax'],
                'description' => $request['description'],
            ]);

            // add address to pharmacy
            $address = $pharmacy->address()->update([
                'city_id' => $request['city'],
                'governorate_id' => $request['governorate'],
                'street' => $request['street'],
                'details' => $request['details'],
            ]);

            $address = $pharmacy->contact()->updateOrCreate([
                'twitter' => $request['twitter'],
                'facebook' => $request['facebook'],
                'instagram' => $request['instagram'],
            ]);

            if ($request->has('lat')) {

                $address->lat = $request['lat'];
                $address->lang = $request['lang'];
            }
            $address->save();


            DB::commit();
            return redirect()->back();
        } catch (\Exception $ex) {

            // return  insert date

            DB::rollback();
            // return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pharmacy $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pharmacy = Pharmacy::findOrFail($id);
            if ($pharmacy->image !== '') { // check if pharmacy has image
                // remove image
                $fileName = public_path('assets/images/pharmacies/' . $pharmacy->image);
                unlink(realpath($fileName));
            }

            $pharmacy->delete();
            return redirect()->route('pharmacy.home');
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // get all orders for user auth
    public function orders()
    {
        $type = [['جديد',' في انتظار الدفع','مكتمل','غير متوفر','مرفوض','مسترجع'],['primary','warning','success','secondary','danger','orange']];
        $route = 'pharmacy.order';
        try {
            $user = User::with('pharmacy')->find(Auth::id());

            $orders = Order::where('pharmacy_id', $user->pharmacy->id)->get();

            return view('order.index', compact('orders','route','type'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $e->getMessage();

        }
    }

    // show order
    public function order($id)
    {
        try {
            $order = Order::with('user')->find($id);

            if ($order) {
                $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);
                if ($order->status == 0) {
                    $order->is_show=1;
                    $order->save();
                    return view('order.product', compact('order', 'products'));
                } else {
                    return view('order.bill-text', compact('order', 'products'));
                }
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
