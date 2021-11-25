<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\GeniusMailer;
use App\Models\Product;
use App\Models\PaymentGateway;
use App\Models\Currency;
use Session;
use Auth;

class CheckoutController extends Controller
{


    public function checkout($slug)
    {
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        }
        else {
            $curr = Currency::where('is_default','=',1)->first();
        }
    	$product = Product::where('slug','=',$slug)->first();
        return view('front.checkout',compact('product','curr'));
    }


}
