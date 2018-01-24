<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Destinations extends Model
{
    protected $fillable = [
        'name',
        'country',
        'duration',
        'image',
        'description',
        'agent_id'
    ];
    public $timestamps = false;

    /**
     *
     */
    public function agents(){
      return $this->hasMany('App\Models\Agents','id','agent_id');
    }

}
