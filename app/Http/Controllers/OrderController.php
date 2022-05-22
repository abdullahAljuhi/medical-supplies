<?php

namespace App\Http\Controllers;

use App\Events\Messages;
use App\Helpers\Helper;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Http\Requests\PharmacyRequest;
use App\Http\Requests\OrderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        try {
            $order = Order::all();

            if ($order) {
                return redirect()->route('order.order');
            } else {
                return view('order.list');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pharmacy $pharmacy)
    {
        return view('order.order', compact('pharmacy'));
    }


    // this function use for send request (order) to pharmacy
    public function send(Request $request)
    {
        try {

            // validation
            $request->validate([
            'product_name'=>'required',
            'governorate'=>'required',
            'city'=>'required',
            'details'=>'required',
            'pharmacy'=>'required|exists:pharmacies,id'
            ], [
                'product_name.required' => 'يجب إدخال اسم المنتج',
                'pharmacy.required'=>'يجب تحديد الصيدلية',
                'governorate.required'=>'المحافظة  مطلوبة',
                'products.required' => 'يجب إدخال اسم المنتج',
                'city.required'=>'المحافظة  مطلوبة',
                'pharmacy.exists'=>'الصيدلية غير موجودة',
            ]
        );
            $governorate = Governorate::find($request['governorate']);
            $city = City::find($request['city']);
            // return $request;
            $address = $governorate->name  . ' - ' . $city->name . ' - ' . $request['details'];
            $type = 0;
            $products = [];
            if ($request->type == 1) {

                // check if request has file image
                if ($request->hasFile('images')) {
                    $type = 1;
                    // images
                    foreach ($request->file('images') as $i => $image) {
                        $products[$i]['id'] = $i;

                        // upload images to public/assets/images/orders
                        $products[$i]['product_name'] = $this->uploadImage("orders", $image);
                    }
                }
            } else {

                foreach ($request->product_name as $i => $name) {
                    $products[$i]['id'] = $i;
                    $products[$i]['product_name'] = $name;
                };

            }
            // quantity
            foreach ($request->quantity as $i => $quantity) {
                $products[$i]['quantity'] = $quantity;
            };
            // return($products);
            $products = json_encode($products, JSON_UNESCAPED_UNICODE);

            // $products=implode(',',$products);


            $order = new Order();
            $order->products = $products;
            $order->user_id = Auth::user()->id;
            $order->address = $address;
            $order->type = $type;
            $order->pharmacy_id = $request->pharmacy;

            //check period
            if(!$request->period){
                $order->is_periodic=0;
                $order->period=0;
            }else{
                $order->is_periodic = 1;
                $order->period = $request->period;
            }

            $order->save();

            $user = Pharmacy::findOrFail($request->pharmacy)->user_id;
            // return $user;
            // send notification for pharmacy
            event(new Messages($order, $user));

            return view('order.orderMass')->with(['success' => 'تم ارسال الطلب  بنجاح']);

        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            // throw $th;
        }
    }


    // this show page that pharmacy can add price

    public function edit(Request $request, $id = '')
    {

        try {
            //code...
            $order = Order::with('pharmacy', 'user')->findOrFail($request->id);

            // check if the pharmacy auth is has the order
            if ($order->pharmacy->user_id == Auth::id()) {

                // convert json to array
                $products = json_decode($order->products, true);
                //    return var_dump($products);
                return view('order.product', compact('order', 'products'));
            }
            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    // this function for update and add price to order from the pharmacy
    public function update(Request $request, $id)
    {
        try {
            // return $request;
            $request->validate([
                'prices'=>'required',
                'prices[]'=>'array|integer',
                'delivery_price'=>'required|integer',
                ], [
                    'prices[].integer'=>'يجب ان يكون رقم ',
                    'prices[].required'=>'يجب إخال سعر المنتج',
                    'delivery_price.required'=>'يجب إخال سعر المنتج',
                ]
            );

            // return $request;
            $order = Order::find($id);

            // convert json to array
            $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);

            $prices = $request->prices;

            // initial total price
            $total_price = 0;

            // store prices products array
            foreach ($prices as $i => $price) {

                $products[$i]['unit_amount'] = $price;

                if($request->found[$i]==1){
                    $products[$i]['found'] = 1;
                }else{
                    $products[$i]['quantity']=0;
                    $products[$i]['found'] = 0;
                }
                $total_price += $price * $products[$i]['quantity'];
            }
            $total_price += $request->delivery_price;
            $status=1;
            if( $total_price==$request->delivery_price){
                $status=3;
            }
            // return $products;
            // convert array to json
            $products = json_encode($products, JSON_UNESCAPED_UNICODE);

            $order->update([
                'products' => $products,
                'total_price' => $total_price,
                'delivery_price' => $request->delivery_price,
                'status' => $status,
                ]);

            // send notification for user who send order
            event(new Messages($order, $order->user_id));
            return redirect('/pharmacy')->with(['success' => 'تم ارسال الاسعار بنجاح  بنجاح']);

        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // this will show the bill
    public function Bill(Request $request)
    {
        try {

            $id = $request->id;

            $order = Order::with('pharmacy', 'user')->find($id);

            // check if the user auth is the owner of the order and order status is not paid
            if (Auth::id() == $order->user_id && $order->status == 1) {

                // convert json to array
                $products = json_decode($order->products, true);

                return view('order.bill-text', compact('order', 'products'));
            }
            redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // change order status to not found
    public function notFond($id){
        try {
            $order=Order::findOrFail($id);
            $order->status=3;
            $order->save();
            return redirect('/pharmacy');
        // send notification for user who send order
        event(new Messages($order, $order->user_id));
        } catch (\Throwable $th) {
            // return
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }
}
       // change order status to not found
       public function cancel($id){
        try {
            $order=Order::findOrFail($id);
            $order->status=4;
            $order->save();
            return redirect('/');

        } catch (\Throwable $th) {
            // return
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }
}
}
