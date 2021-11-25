<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vpresentation extends Model
{
    protected $fillable = ['title', 'photo'];

    public $timestamps = false;

}