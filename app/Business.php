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
      'password',
      'confirm password'
    ];
}
