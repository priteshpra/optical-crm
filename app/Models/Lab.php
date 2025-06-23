<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'created_date',
        'bill',
        'cust_name',
        'frame_type',
        'fitter',
        'receive_date',
        'delivery_date',
        'time',
    ];
    //
}
