<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $fillable = [     
        'name',
        'birthdate',
        'voterid',
        'state',
        'street',
        'neighborhood',
        'city',
        'zipcode',
        'signature'
    ];
}
