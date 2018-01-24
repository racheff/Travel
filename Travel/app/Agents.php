<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company'
    ];
    public $timestamps = false;
}
