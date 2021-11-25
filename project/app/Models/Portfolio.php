<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title','slug','subtitle','details','photo','photo1','meta_tag','meta_description'];

    public $timestamps = false;
}