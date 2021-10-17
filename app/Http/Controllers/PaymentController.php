<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status'])
        {
            $product_id = $paymentDetails['data']['metadata']['id'];
            Order::create(['product_id' => $product_id,
                'user_id' => $paymentDetails['data']['metadata']['user_id'],
                'payment_date' => $paymentDetails['data']['paid_at'],
                'shipping_address' => $paymentDetails['data']['metadata']['address'],
                'total_amount' => $paymentDetails['data']['amount'] / 100,
                'shipping_fee' => $paymentDetails['data']['metadata']['fee']]);

            Product::where('id', $product_id)->update(['status' => 'paid']);

            return view('payment.callback')->with('res', $paymentDetails);
        }

//        dd($paymentDetails['data']['amount']);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
