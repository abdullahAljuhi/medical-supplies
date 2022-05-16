<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pharmacy;
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
                return veiw('order.list');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
            
        }
    }
    public function create(Pharmacy $pharmacy)
    {
        return view('order.order',compact('pharmacy'));
    }
    public function send(Request $request)
    {
       // return $request['order_name'];
        $address=$request['governorate'].' - '.$request['city'].' - '.$request['details'];
        
        $products=implode(',',$request['products']);
        // return $products;
      $order=new Order();
      $order->products=$products;
      $order->user_id=Auth::user()->id;
      $order->address=$address;
    $order->save();
       
        return $order;

       // return view('order.orderMass');
    }

    public function store(Request $request)
    {
        
        $address=$request['governorate'].' - '.$request['city'].' - '.$request['details'];
        
        $products=implode(',',$request['order_name']);
        $order= Order::create([
            'product'=>$products,
            'address'=>$adress,
            'price'=>$request['price'],
            'status'=>$request['status'],
            'total'=>$request['total'],
            'delever'=>$request['delever'],
            'user_id' => Auth::id(),
            'pharmcy_id' => Pharmcy::id(),
        ]);
        $order->save();
        
    }
}
