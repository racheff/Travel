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
        'card',
        'number',
        'ccv',
        'exp',
        'name'
    ];
    public function booking(){
        return $this->belongsTo('App\Bookings.php', 'booking_id');
    }
    public static function finalPrice($booking_id){
        $booking = Bookings::find($booking_id)->toArray();
        $destination = Destinations::find($booking['destination_id'])->toArray();
        $vehicle = Vehicles::find($booking['vehicle_id'])->toArray();
        return $destination['price'] + $vehicle['ticket_price'];
    }
}
