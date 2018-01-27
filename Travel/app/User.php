<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function  isAdmin(){
      if(!Auth::guest()){
          $user = User::find(Auth::id())->toArray();
          if($user['admin'] == 1){
              return true;
          }
      }
    }
    public function bookings()
    {
        return $this->hasMany('App\Bookings','user_id');
    }
}
