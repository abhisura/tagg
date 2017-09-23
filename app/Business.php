<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable=[
      'businessname',
      'address1',
      'address2',
      'city',
      'zipcode',
      'state',
      'businessemail',
    ];

/**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
protected $hidden = [
    'password', 'confirmpassword',
];
}