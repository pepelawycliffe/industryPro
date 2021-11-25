<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generalsetting;
use App\Models\Currency;
use Illuminate\Support\Facades\Session;

class Product extends Model
{

    protected $fillable = ['slug','title','subtitle','details','price','type','meta_tag','meta_description'];
    public $timestamps = false;

    public function convertPrice() {
        $price = $this->price;
        if (Session::has('currency')) 
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $price = round($price * $curr->value,2);
        return $price;
    }

    public function showPrice() {
        $price = $this->price;
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) 
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $price = round($price * $curr->value,2);
        if($gs->currency_format == 0){
            return '<sup>'.$curr->sign.'</sup>'.$price;
        }
        else{
            return $price.'<sup>'.$curr->sign.'</sup>';
        }
    }

}
