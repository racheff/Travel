<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Laravel\Scout\Searchable;

class Destinations extends Model
{
    use Searchable;
    protected $fillable = [
        'name',
        'country',
        'duration',
        'image',
        'description',
        'agent_id',
        'price'
    ];
    public $timestamps = false;

    /**
     *
     */
    public function agents(){
return $this->belongsTo('App\Agents','agent_id');
    }
    public function searchableAs()
    {
        return 'name';
    }

}
