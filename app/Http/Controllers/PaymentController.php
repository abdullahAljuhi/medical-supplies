<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Events\Messages;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{




    /**
     * The index function which is used for posting the data to the api
     */
    public function index(Request $request)
    {

        try {

            // return $request;
            $id = $request->id;

            $order = Order::with('pharmacy', 'user')->findOrFail($id);
            if (Auth::id() == $order->user_id && $order->status == 1) {

                $products = json_decode($order->products, true);

                // return $products;
                $data = [
                    "order_reference" => $order->id,
                    "products" => $products,
                    "currency" => "YER",
                    "total_amount" => $order->total_price,
                    "success_url" => "http://127.0.0.1:8000/test/response",
                    "cancel_url" => "http://127.0.0.1:8000/test/cancel",
                    "metadata" => [
                        "Customer name" => $order->user->name,
                        "order id" => $order->id
                    ]
                ];




                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://waslpayment.com/api/v1/merchant/payment_order",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($data),

                    CURLOPT_HTTPHEADER => array(

                        "private-key: 856301060110657998333612",
                        "public-key: 996735847989035",
                        "Content-Type:  application/x-www-form-urlencoded"


                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo " Error #:" . $err;
                }

                $result = json_decode($response, true);

                $next_url = $result['invoice']['next_url'];

                return redirect($next_url);
          
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * This function is used to show the success page with the amount and the other details
     */
    public function showTest()
    {
        try {
            
            
            $info = Route::current()->parameter('info');

            $info = base64_decode($info);
            $data = json_decode($info, true);

            
            $meta_data = json_decode($data['meta_data'], true);
            $id = $meta_data['order id'];
            $order = Order::with('pharmacy')->find($id);
            
            if ($data['status'] == 'success') {

                $status = $data['status'];
                $order_reference = $data['order_reference'];
                $products = json_decode($order->products, true);
                $card = $data['customer_account_info']['card_type'];
                $date = $data['customer_account_info']['created_at'];
                $name = $meta_data['Customer name'];

                $paid_amount = $data['customer_account_info']['paid_amount'];
                // user
                $user = $order->user_id;

                //change order status
                $order->status = 2;

                //create random number
                $code = $order->code = random_int(100000, 999999);
                //pharmacy
                $pharmacy = Pharmacy::findOrFail($order->pharmacy_id)->user_id;

                // send notification for pharmacy
                event(new Messages($order, $pharmacy,'  تم الدفع في انتظار التوصيل'));
               
                $order->save();
                $admin  = User::where('type','1')->first();

                $admin->deposit($paid_amount); 

            } else {

                $order->status = 6;

            // $pharmacy = Pharmacy::findOrFail($order->pharmacy_id)->user_id;
            // // send notification for pharmacy
            // event(new Messages($order, $pharmacy,'  تم الدفع في انتظار التوصيل'));
                $order->save();
            }

            return view('order.finalBill', compact('order', 'status', 'products', 'card', 'date', 'name', 'paid_amount','code'))->with(['success' => ' تم الدفع بنجاح']);
        } catch (\Throwable $th) {
            return redirect('/')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            //  $th->getMessage();

        }
    }
    public function siteRate($paid_amount){
        $amount = $paid_amount *(10/100);
            
        $reminder  = $paid_amount - $amount;
    }

    // store in wallet
    // public function wallet($paid_amount , $user){
    //     try {

                    // $admin  = User::where('type','1')->first();
                        
    //                 $amount = $paid_amount *(10/100);
            
    //                 $reminder  = $paid_amount - $amount;
            
    //                 $admin->deposit($reminder); 
            
    //                 $admin->deposit($amount); 

    //     } catch (\Throwable $th) {

    //         return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    //     }

        
    // }
        // get auth  wallet
        public function test_wallet(){
    
            $user   = User::find(Auth::id());
 
            $wallet = $user->wallet;

            $transactions = $wallet->transactions;

            $recipient=0;
            
            $sender=0;

            //clc recipient and sender
            foreach ($transactions as $transaction ) {

                if($transaction->type=='deposit')

                $sender+=$transaction->amount ;
                else
                $recipient+= $transaction->amount ;
            }
      
            
            return view('wallat.index',compact('wallet','recipient','sender','transactions'));
        }

        // the retrieval order and return rate of site to user
        public function retrievalOrder($orderId,$productId=''){
            try {
                // return $request->d;
                $order = Order::with('user','pharmacy')->findOrFail($orderId);
                
                // get user
                $user = $order->user;
                
                // get admin
                $admin = User::where('type','1')->first();

                $pharmacy_user = Pharmacy::findOrFail($order->pharmacy_id)->user_id;

                if($productId !=''){

                    $products = json_decode($order->products, true);

                    //marke yield products 
                    $products[$productId]['yield'] = 1;

                    // return $products;
                    $total_price = 0;
                    
                    $yield =0;

                    // clc total price
                    foreach ( $products as $product) {

                        if($product['yield'] == 1){

                            $product['quantity'] = 0;
                    }

                    $total_price += $product['unit_amount'] * $product['quantity'];
                    
                }

                // add delivery_price
                $total_price+= $order->delivery_price;

                $yield += $order->total_price - $total_price;

                // return  $total_price;
                $products = json_encode($products, JSON_UNESCAPED_UNICODE);

                // save products
                $order->products=$products;

                $order->total_price = $total_price;
                
                if($order->total_price == $order->delivery_price){
                   
                    // change order status
                    $order->status=7;
                    
                    $admin->transfer($user, $yield);
                    
                    // return $order;
                    $order->save();

                }else{
                 //convert rate form site account to user account
                $admin->transfer($user, $yield);

                $order->save();
                event(new Messages($order,  $pharmacy_user,' هناك بعض الادويه مسترجعه'));
                }
                //convert rate form site account to user account
                // $admin->transfer($user, $yield);
            }else{

                $order->status=7;

                // sub
                $sub = $order->total_price - $order->delivery_price;

                //convert rate form site account to user account
                $admin->transfer($user, $sub);

                $order->save();
                event(new Messages($order,  $pharmacy_user,' هناك طلب مسترجع'));

            }
                return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // When the pharmacy delivered the medicine to the user
        public function receiveOrder(Request $request,$id){
            try {
                // get order
                $order = Order::with('user','pharmacy')->findOrFail($id);
                
                $admin  = User::where('type','1')->first();
                
                // check if user is receive order
                if($order->code ==  $request->code){

                    // $user = $order->user;

                    // calc total amount that convert to user
                    $amount = $order->total_price - ($order->total_price * 5/100);
                    // get pharmacy
                    // $pharmacy = Auth::user();
                    $pharmacy = User::find($order->pharmacy->user_id);

                    
                    $admin->transfer($pharmacy, $amount); 

                    $order->status = 3;

                    $order->save();
                    
                    return redirect('/pharmacy');
                }

            } catch (\Throwable $th) {
                // throw $th;
                return $th->getMessage();
            }

        }

    }
