<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class RegistersController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'businessname' => 'required|max:255',
            'address1' => 'required|max:40',
            'address2' => 'required|max:40',
            'city' => 'required|max:40',
            'zipcode' => 'required|max:6',
            'state' => 'required',
            'businessemail' => 'email|unique:posts',
            'password' => 'password',
            'confirm password' => 'confirm password',
        ]);

        $businesses = new Business;
        $businesses ->businessname = $request->input('businessname');
        $businesses ->address1 = $request->input('address1');
        $businesses ->address2 = $request->input('address2');
        $businesses ->city = $request->input('city');
        $businesses ->zipcode = $request->input('zipcode');
        $businesses ->state = $request->input('state');
        $businesses ->businessemail = $request->input('businessemail');
        $businesses ->password = $request->input('password');
        $businesses ->confirmpassword = $request->input('confirm password');
        $businesses ->save();
        return redirect('/')->with('response', 'Thanks for regestering with Tagg. You will be notfied shortly with your account details');

    }
}
