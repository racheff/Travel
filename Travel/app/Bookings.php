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
        'vehicle_id',
        'status',
        'from',
    ];
   public function destinations(){
       return $this->belongsTo('App\Destinations', 'destination_id');
   }
   public function vehicles(){
       return $this->belongsTo('App\Vehicles', 'vehicle_id');
   }
   public static function updateStatus($id){
       $booking = Bookings::find($id);
       if($booking) {
           $booking->status = 'paid';
           $booking->save();
       }
   }
    public static function refund($id){
        $booking = Bookings::find($id);
        if($booking) {
            $booking->status = 'wait';
            $booking->save();
        }
    }
}

