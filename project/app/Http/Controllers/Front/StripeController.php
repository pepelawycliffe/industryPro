<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Validator;
use App\Models\Order;
use App\Models\Notification;
use App\Models\Generalsetting;

class StripeController extends Controller
{
  public function __construct()
    {
        //Set Spripe Keys
        $stripe = Generalsetting::findOrFail(1);
        Config::set('services.stripe.key', $stripe->stripe_key);
        Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request){

     $settings = Generalsetting::findOrFail(1);
        $order = new Order;
        $success_url = action('Front\PaymentController@payreturn');
        $item_name = $settings->title." Order";
        $item_number = str_random(4).time();
        $item_amount = $request->total;
        $validator = Validator::make($request->all(),[
                        'card' => 'required',
                        'cvv' => 'required',
                        'month' => 'required',
                        'year' => 'required',
                    ]);

        if ($validator->passes()) {

            $stripe = Stripe::make(Config::get('services.stripe.secret'));
            try{
                $token = $stripe->tokens()->create([
                    'card' =>[
                            'number' => $request->card,
                            'exp_month' => $request->month,
                            'exp_year' => $request->year,
                            'cvc' => $request->cvv,
                        ],
                    ]);
                if (!isset($token['id'])) {
                    return back()->with('error','Token Problem With Your Token.');
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $request->currency_code,
                    'amount' => $item_amount,
                    'description' => $item_name,
                    ]);

                if ($charge['status'] == 'succeeded') {

                    $order['pay_amount'] = $item_amount;
                    $order['method'] = $request->method;
                    $order['customer_email'] = $request->customer_email;
                    $order['customer_name'] = $request->customer_name;
                    $order['customer_phone'] = $request->customer_phone;
                    $order['order_number'] = $item_number;
                    $order['customer_address'] = $request->customer_address;
                    $order['customer_city'] = $request->customer_city;
                    $order['customer_zip'] = $request->customer_zip;
                    $order['payment_status'] = "Pending";
                    $order['currency_sign'] = $request->currency_sign;
                    $order['subtitle'] = $request->subtitle;
                    $order['title'] = $request->title;
                    $order['details'] = $request->details;
                    $order['type'] = $request->type;
                    $order['payment_status'] = "Completed";
                    $order['txnid'] = $charge['balance_transaction'];
                    $order['charge_id'] = $charge['id'];

                    $order->save();
                    $notification = new Notification;
                    $notification->order_id = $order->id;
                    $notification->save();



                    return redirect($success_url);
                }
                
            }catch (Exception $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', 'Please Enter Valid Credit Card Informations.');
    }
}
