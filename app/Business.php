<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses';
    protected $fillable = [
        'name',
        'street_address',
        'place_id',
        'city',
        'state',
        'zip',
        'country',
        'admin',
        'lat',
        'lng'
    ];
}
