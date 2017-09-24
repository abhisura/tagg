<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable=[
      'org_name',
      'street_address1',
      'street_address2',
      'city',
       'state',
      'zipcode',
      'phone_number',
    ];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
}