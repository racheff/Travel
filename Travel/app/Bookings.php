<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Bookings extends Model
{
    //
    protected $fillable = [
        'user_id',
        'destination_id',
        'status',
        'from',
    ];
   public function destinations(){
       return $this->belongsTo('App\Destinations', 'destination_id');
   }
}

