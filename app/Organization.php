<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organization extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_name',
        'org_description',
        'street_address1',
        'street_address2',
        'city',
        'zipcode',
        'state',
        'phone_number',
    ];
}
