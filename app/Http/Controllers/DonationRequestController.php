<?php
namespace App\Http\Controllers;

use App\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Validator;


class DonationRequestController extends Controller
{
    public function index()
    {
        $donationrequest = DonationRequest::all();
        return view('donationrequests.Index', compact('donationrequest'));
    }
    public function create(Request $request)
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */


    public function store(Request $request)
    {//dd('Yup');
        //dd($request);
        $validator = Validator::make($request->all(), [
            'requester' => 'required',
            'requester_type' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'address1' => 'required',
            // 'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'taxexempt' => 'required',
            'item_requested' => 'required',
            'item_purpose' => 'required',
            'eventname' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'eventpurpose' => 'required',
            'formAttendees' => 'required',
            'venue' => 'required',
            'marketingopportunities' => 'required'
        ]);
        if ($validator->fails())
        {
            return redirect('donationrequest') ->withErrors($validator)->withInput();
        }
        /*$this->validate($request,
            [
                'requester' => 'required',
                'requester_type' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phonenumber' => 'required',
                'address1' => 'required',
                // 'address2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
                'taxexempt' => 'required',
                'item_requested' => 'required',
                'item_purpose' => 'required',
                'eventname' => 'required',
                'startdate' => 'required',
                'enddate' => 'required',
                'eventpurpose' => 'required',
                'formAttendees' => 'required',
                'venue' => 'required',
                'marketingopportunities' => 'required'
            ]);*/

        $donationRequest = new DonationRequest;
        $donationRequest->organization_id = $request->orgId;
        $donationRequest->requester = $request->requester;
        $donationRequest->requester_type = $request->requester_type;
        $donationRequest->first_name = $request->firstname;
        $donationRequest->last_name = $request->lastname;
        $donationRequest->email = $request->email;
        $donationRequest->phone_number = $request->phonenumber;
        $donationRequest->street_address1 = $request->address1;
        $donationRequest->street_address2 = $request->address2;
        $donationRequest->city = $request->city;
        $donationRequest->state = $request->state;
        $donationRequest->zipcode = $request->zipcode;
        $donationRequest->tax_exempt = $request->taxexempt;
        $donationRequest->item_requested = $request->item_requested;
        $donationRequest->item_purpose = $request->item_purpose;
        $donationRequest->event_name = $request->eventname;
        $donationRequest->event_start_date = $request->startdate;
        $donationRequest->event_end_date = $request->enddate;
        $donationRequest->event_purpose = $request->eventpurpose;
        $donationRequest->est_attendee_count = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketing_opportunities = $request->marketingopportunities;
        //dd($donationRequest);
        $donationRequest->save();

        /**
         * $donationrequest = new DonationRequestModel;
         * $donationrequest ->organization = $donationrequest->input('organization');
         * $donationrequest ->requester_type = $donationrequest->input('requester_type');
         * $donationrequest ->firstname = $donationrequest->input('firstname');
         * $donationrequest ->lastname = $donationrequest->input('lastname');
         * $donationrequest ->email = $donationrequest->input('email');
         * $donationrequest ->phonenumber = $donationrequest->input('phonenumber');
         * $donationrequest ->address1 = $donationrequest->input('address1');
         * $donationrequest ->addres21 = $donationrequest->input('address2');
         * $donationrequest ->city = $donationrequest->input('city');
         * $donationrequest ->state = $donationrequest->input('state');
         * $donationrequest ->zipcode = $donationrequest->input('zipcode');
         * $donationrequest ->taxexempt = $donationrequest->input('taxexempt');
         * $donationrequest ->item_requested = $donationrequest->input('item_requested');
         * $donationrequest ->item_purpose = $donationrequest->input('item_purpose');
         * $donationrequest ->eventname = $donationrequest->input('eventname');
         * $donationrequest ->eventdate = $donationrequest->input('eventdate');
         * $donationrequest ->enddate = $donationrequest->input('enddate');
         * $donationrequest ->eventpurpose = $donationrequest->input('eventpurpose');
         * $donationrequest ->formAttendees = $donationrequest->input('formAttendees');
         * $donationrequest ->venue = $donationrequest->input('venue');
         * $donationrequest ->marketingopportunities = $donationrequest->input('marketingopportunities');
         * $donationrequest ->save();
         * return redirect('/')->with('response', 'Your donation request has been recieved.');
         * }
         */
        /*if ($validator->fails()) {
            dd('fail');
            return redirect('donationrequest/create')
                ->withErrors($validator)
                ->withInput();
        }*/
        //$donationrequest = Request::all();
        //DonationRequest::create($donationrequest);
        return redirect('/');
    }
}