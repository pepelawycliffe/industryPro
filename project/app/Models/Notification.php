<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }

    public static function countOrder()
    {
        return Notification::where('order_id','!=',null)->where('is_read','=',0)->orderBy('id','desc')->get()->count();
    }



}
