<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class PaymentController extends Controller
{




    /**
     * The index function which is used for posting the data to the api
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $order = Order::with('pharmacy', 'user')->find($id);
        if (Auth::id() == $order->user_id && $order->status == 1) {
            
            $products = json_decode($order->products, true);
            
            $data = [
                "order_reference" => $order->id,
                "products" =>$products,
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
            } else {
              $result = json_decode($response, true);
              $next_url = $result['invoice']['next_url'];
              return redirect($next_url);
            }
        }
    }

      /**
   * This function is used to show the success page with the amount and the other details
   */
  public function showTest()
  {
    $info = Route::current()->parameter('info');

    $info = base64_decode($info);
    $data = json_decode($info, true);

    
    // for ($i = 0; $i < count($data); $i++) {
    //   $status = array_column($arrayFormat, 'status');
    //   $paid_amount = array_column($arrayFormat, 'paid_amount');
    //   $card_holder = array_column($arrayFormat, 'card_holder');
    //   $card_type = array_column($arrayFormat, 'card_type');
    //   $created_at = array_column($arrayFormat, 'created_at');
    //   $updated_at = array_column($arrayFormat, 'updated_at');
    // }
    // $card_type = str_replace('+', ' ', $card_type[0]);
    // $card_holder = str_replace('+', ' ', $card_holder[0]);
    if($data['status']=='success'){
        echo 'success';
    }else{

    }
    // echo $card_type . '<br>';
    // echo $card_holder . '<br>';
    // // print_r($paidatad_amount) ;
    // echo '<br>';
    // print_r($status) ;
    //  echo '<br>';
    // die();
    // return view('paymentViews.testResponse', compact('paid_amount', 'status', 'card_holder', 'card_type', 'created_at'));
  }


}
