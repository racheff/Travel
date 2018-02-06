<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'type', 'ticket_price'
    ];
}
