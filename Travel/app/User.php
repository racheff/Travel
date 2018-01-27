<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    public  function  isAdmin($id){
        $isAdmin = false;
        $user = User::all()->where('id',$id)->toArray();
        if($user[0]['admin'] == 1){
            $isAdmin = true;
        }

        return $isAdmin;
    }
    public function bookings()
    {
        return $this->hasMany('App\Bookings','user_id');
    }
}
