<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'time',

        'r_dist_sph',
        'r_dist_cyl',
        'r_dist_axis',
        'r_near_sph',
        'r_near_cyl',
        'r_near_axis',

        'l_dist_sph',
        'l_dist_cyl',
        'l_dist_axis',
        'l_near_sph',
        'l_near_cyl',
        'l_near_axis',

        'frame',
        'lenses',
        'instructions',
        'total',
        'advance',
        'balance',
    ];
}
