<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
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

            $id = $request->id;

            $order = Order::with('pharmacy', 'user')->find($id);
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
                    CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($data),

                    CURLOPT_HTTPHEADER => array(

                        "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
                        "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
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

                //change order status
                $order->status = 2;
                $order->save();

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


            if ($data['status'] == 'success') {
             
                $status = $data['status'];
                $order_reference = $data['order_reference'];
                $products = json_decode($data['products'], true);
                $card = $data['customer_account_info']['card_type'];
                $date = $data['customer_account_info']['created_at'];
                $meta_data = json_decode($data['meta_data'], true);
                $name = $meta_data['Customer name'];
                $id = $meta_data['order id'];

                $paid_amount = $data['customer_account_info']['paid_amount'];
                $order = Order::with('pharmacy')->find($id);
                $pharmacy = $order->pharmacy->user_id;

                $this->wallet($paid_amount,$pharmacy);

            } else {
            }

            return view('order.finalBill', compact('order', 'status', 'products', 'card', 'date', 'name', 'paid_amount'));
        } catch (\Throwable $th) {
            return redirect('/')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            //  $th->getMessage();

        }
    }

    // store in wallet
    public function wallet($paid_amount,$pharmacy){

        $admin  = User::where('type','1')->first();

        $user   = User::find($pharmacy);


        $amount = $paid_amount *(5/100);

        $reminder  = $paid_amount - $amount;
        $user->deposit($reminder); 

        $admin->deposit($amount); 
        
        

    }
        // store in wallet
        public function test_wallet(){

            $admin  = User::where('type','1')->first();
    
            $user   = User::find(Auth::id());
    
            $user->deposit(100); 
    
            $admin->deposit(100); 
            
            return $wallet=$user->wallet->transactions;
        }
}
