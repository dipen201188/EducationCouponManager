<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'title',
        'desc',
        'header',
        'trailer',
        'desc_image',
        'logo',
        'version',
        'expire_date'
    ];
}
