<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class RegistersController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'org_name' => 'required',
            'street_address1' => 'required',
            //'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'phone_number' => 'required'
        ]);

        $newOrganization = new Organization;
        $newOrganization ->org_name = $request->input('org_name');
        $newOrganization ->street_address1 = $request->input('street_address1');
        $newOrganization ->street_address2 = $request->input('street_address2');
        $newOrganization ->city = $request->input('city');
        $newOrganization ->state = $request->input('state');
        $newOrganization ->zipcode = $request->input('zipcode');
        $newOrganization ->phone_number = $request->input('phone_number');
$temp = $newOrganization ->save();
//dd($temp);
        //$orgID = $this->saveOrganization($newOrganization);

        // TODO: Get path of user registration screen.. Also Pass user Role??
        // IF orgID NOT EMPTY/Nothing/0 THEN
        return redirect('/Register', $orgID, $userRole);
        //ELSE throw error


    }

    /*private function saveOrganization(Organization $Org)
    {
        if($Org ->save(){
            return response:::json(array('success' => true, 'last_insert_id' => $Org->id), 200);
        }else {
            return 0;
    }
    }*/
}
