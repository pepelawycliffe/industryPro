<?php

namespace App\Http\Controllers\Front;

use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Notification;
use App\Models\Generalsetting;
use App\Models\Order;

class MollyPaymentController extends Controller
{

    public function store(Request $request){

        $settings = Generalsetting::findOrFail(1);
        $item_name = $settings->title." Order";
        $item_number = str_random(4).time();
        $item_amount = $request->total;
        $order['pay_amount'] = $item_amount;
        $order['method'] = $request->method;
        $order['customer_email'] = $request->customer_email;
        $order['customer_name'] = $request->customer_name;
        $order['customer_phone'] = $request->customer_phone;
        $order['order_number'] = $item_number;
        $order['customer_address'] = $request->customer_address;
        $order['customer_city'] = $request->customer_city;
        $order['customer_zip'] = $request->customer_zip;
        $order['currency_sign'] = $request->currency_sign;
        $order['subtitle'] = $request->subtitle;
        $order['title'] = $request->title;
        $order['details'] = $request->details;
        $order['type'] = $request->type;
        Session::put('molly_data',$order);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $request->currency_code,
                'value' => ''.sprintf('%0.2f', $item_amount).'', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => $item_name ,
            'redirectUrl' => route('payment.molly.notify'),
            ]);
        
            Session::put('payment_id',$payment->id);
    
            $payment = Mollie::api()->payments()->get($payment->id);
    
            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);
    }

    
    public function notify()
    {
        $success_url = action('Front\PaymentController@payreturn');
        $molly_data = Session::get('molly_data');
        $payment = Mollie::api()->payments()->get(Session::get('payment_id'));
        if($payment->status == 'paid'){
            $order = new Order;

            $order['pay_amount'] = $molly_data['pay_amount'];
            $order['method'] = $molly_data['method'];
            $order['customer_email'] = $molly_data['customer_email'];
            $order['customer_name'] = $molly_data['customer_name'];
            $order['customer_phone'] =$molly_data['customer_phone'];
            $order['order_number'] = $molly_data['order_number'];
            $order['customer_address'] = $molly_data['customer_address'];
            $order['customer_city'] = $molly_data['customer_city'];
            $order['customer_zip'] = $molly_data['customer_zip'];
            $order['payment_status'] = 'Completed';
            $order['currency_sign'] = $molly_data['currency_sign'];
            $order['subtitle'] = $molly_data['subtitle'];
            $order['title'] = $molly_data['title'];
            $order['details'] =$molly_data['details'];
            $order['type'] = $molly_data['type'];
            $order['txnid'] = $payment->id;
            $order->save();
            $notification = new Notification;
            $notification->order_id = $order->id;
            $notification->save();

            return redirect($success_url);
        }


    }


}
