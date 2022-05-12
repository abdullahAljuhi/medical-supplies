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
        return view('order.order',compact('pharmacy'));
    }





    public function edit(Request $request,$id='')
    {
        // return $request;
        // if($id!=''){
            $order = Order::find($request->id);
        // }else{
            // $order = Order::find($id);
        // }
        $user=User::find($order->user_id);
        $products=explode(',',$order->products);
        // return $order;
        return view('order.product',compact('order','user','products'));
    }





    public function send(Request $request)
    {
       // return $request['order_name'];
        $address=$request['governorate'].' - '.$request['city'].' - '.$request['details'];
        
        $products=implode(',',$request['products']);
        
        $order=new Order();
        $order->products=$products;
        $order->user_id=Auth::user()->id;
        $order->address=$address;
        $order->pharmacy_id=$request->pharmacy;
        $order->save();
        event(new Messages($order,$request->pharmacy));
        return view('order.orderMass');

    }

    public function update(Request $request , $id)
    {
        $order=Order::find($id);
        $products=explode(',',$order->products);
        // return $order->products;
        $prices=$request->prices;
        $total=0;
        foreach ($prices as $price ) {
            $total+=$price;
        }
        // $products = array_combine($products, $prices);
        // $products=json_encode($products,JSON_UNESCAPED_UNICODE);
        
        // $order->update([
        //     'products' => $products,
        //     'total'=>$total,
        //     'delever'=>$request->delever,
        //     'status'=>'1',
        // ]);
        $order->save();
        event(new Messages($order,$order->user_id));
        return $order;
        
    }
}
