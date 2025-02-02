<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    

    //test form 
    public function textform(){
        return view('payment.test');
    }

    // code for send amount
    public function submit(Request $request)
    {
        $amount= $request->input('orderamount');
        $notes= $request->input('ordernote');
        $name = $request->input('customername');
        $email = $request->input('customeremail');
        $phone= $request->input('cuatomerphone');
       
        $frmData = array(

            'order_id' => 'OrderId'.rand(),
            'order_amount' => $amount,
            'order_note' =>    $notes,
            'order_currency' => 'INR',
       
       'customer_details' => array(
            'customer_id' => 'customer_'.rand(),
            'customer_name' => $name,
            'customer_phone' =>  $phone,
            'customer_email' =>  $email
           
       ),
       'order_meta'=> array(
             'return_url' => route('payment.success').'?order_id={order_id}',
              'notify_url' => '',
           // 'payment_methods'=>"upi" 
       )
       );
      
              $url = "https://api.cashfree.com/pg/orders";
                //  $url=env('CASHFREE_URL');
            
               $data_string = json_encode($frmData );
              
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, "$url");
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
               curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
               curl_setopt(
                   $ch,
                   CURLOPT_HTTPHEADER,
                   array(
                       'Accept: application/json',
                       'x-api-version: 2022-09-01',
                       'Content-Type: application/json',
                       'x-client-id:'. env('CASHFREE_API_KEY'),
                       'x-client-secret:'. env('CASHFREE_API_SECRET')
                   )
               );
       
               $result = curl_exec($ch);
               $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
               curl_close($ch);

            // Decode the JSON response
            $resp = json_decode($result, true);
            // dd($result);
            if (isset($resp['payment_session_id'])) {
                $session = $resp['payment_session_id'];
            } else {
                $session = null;
            }
        return view('payment.checkout', compact('session'));
    }


    public function success(Request $request)
    {
        $orderId = $request->input('order_id');
        $paymentId = $request->input('payment_id');
        return view('payment.success', compact('orderId', 'paymentId'));
    }

}

