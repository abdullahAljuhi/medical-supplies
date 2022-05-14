<?php

namespace App\Http\Controllers;

use App\Events\Messages;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $order = Order::where('user_id', Auth::id())->first();

            if (empty($order)) {
                return redirect()->route('order.order');
            } else {
                return view('order.list');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function create(Pharmacy $pharmacy)
    {
        return view('order.order', compact('pharmacy'));
    }





    public function edit(Request $request, $id = '')
    {

        try {
            //code...
            $order = Order::with('pharmacy','user')->find($request->id);
            if($order->pharmacy->user_id==Auth::id()){
                $products = json_decode($order->products, true);

                return view('order.product', compact('order','products'));
            }
            return redirect()->back();
         
        } catch (\Throwable $th) {
            throw $th;
        }
    }





    public function send(Request $request)
    {
        try {
            //code...

            // return $request['order_name'];
            $address = $request['governorate'] . ' - ' . $request['city'] . ' - ' . $request['details'];
            $products = [];
            foreach ($request['products']['name'] as $i => $name) {
                $products[$i]['name'] = $name;
            };

            foreach ($request['products']['quantity'] as $i => $quantity) {
                $products[$i]['quantity'] = $quantity;
            };
            $products = json_encode($products, JSON_UNESCAPED_UNICODE);

            // $products=implode(',',$products);
            $order = new Order();
            $order->products = $products;
            $order->user_id = Auth::user()->id;
            $order->address = $address;
            $order->pharmacy_id = $request->pharmacy;
            $order->save();
            event(new Messages($order, $request->pharmacy));
            return view('order.orderMass');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            //code...

            $order = Order::find($id);
            $products = json_decode($order->products, JSON_UNESCAPED_UNICODE);

            $prices = $request->prices;

            $total = 0;
            foreach ($prices as $i => $price) {
                $products[$i]['unit_amount'] = $price;

                $total += $price * $products[$i]['quantity'];
            }
            // return $products;
            $products = json_encode($products, JSON_UNESCAPED_UNICODE);

            $order->update([
                'products' => $products,
                'total' => $total,
                'delever' => $request->delever,
                'status' => '1',
            ]);
            $order->save();
            event(new Messages($order, $order->user_id));
            return $order;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function Bill(Request $request)
    {
        try {
            //code...

            // return $request;
            // dd($request);
            $id = $request->id;
            $order = Order::with('pharmacy', 'user')->find($id);
            if (Auth::id() == $order->user_id && $order->status == 1) {
                $products = json_decode($order->products, true);
                // foreach ($products as $i=>$product ) {
                //     // $products[$i]['unit_amount']= $price;
                //     $products[$i]['product_name'] = $product['name'];
                //     // dd( $product['product_name']);

                //     // $total+=$price;
                // }

                // unset($arr[$oldkey]);

                // return $products;
                return view('order.bill-text', compact('order', 'products'));
            }
            redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
