<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title','details','photo','subtitle','is_featured','category_id','slug'];
    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }
    public function subcategory()
    {
    	return $this->belongsTo('App\Models\Subcategory');
    }



}
