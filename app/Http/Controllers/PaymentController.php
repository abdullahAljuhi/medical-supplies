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
               foreach ($products as $i=>$product ) {
                    // $products[$i]['unit_amount']= $price;
                    $products[$i]['product_name'] = $product['name'];
                    // dd( $product['product_name']);

                    // $total+=$price;
                }
            // return $products;
            $data = [
                "order_reference" => "123412",

                "products" => $products, "currency" => "YER",
                "total_amount" => $order->total,
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
                //    print_r(json_decode($response,true));
                $result = json_decode($response, true);
                return $result;
                $next_url = $result['invoice']['next_url'];
                //    $next_url=substr_replace('//','/ ',$result['invoice']['next_url']);

                return redirect($next_url);
                //  echo $next_url;


            }
        }
    }
}
