<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'status',
        'card'
    ];
    public function booking(){
        return $this->belongsTo('App\Bookings.php', 'booking_id');
    }
}
