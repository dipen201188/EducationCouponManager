<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $fillable = [
        'name',
        'street1',
        'street2',
        'city',
        'state',
        'zip',
        'zip_ext',
        'admin',
        'category'
    ];
}
