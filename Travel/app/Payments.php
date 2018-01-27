<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'booking_id',
        'amount',
        'status',
        'details'
    ];
}
