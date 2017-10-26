<?php
namespace App\Http\Controllers;

use App\DonationRequest;
use App\Events\SendAutoRejectEmail;
use App\Events\TriggerAcceptEmailEvent;
use App\File;
use App\Request_event_type;
use App\Request_item_purpose;
use App\Request_item_type;
use App\Requester_type;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Events\DonationRequestReceived;
use App\Organization_type;
use Illuminate\Contracts\Filesystem\Filesystem;
use Auth;
use Excel;
use App\Organization;




class DonationRequestController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $organization = Organization::findOrFail($organizationId);
        $organizationName = $organization->org_name;
        $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
        //dd($donationrequests);
        return view('donationrequests.index', compact('donationrequests', 'organizationName'));
    }

    public function create()
    {
//        $user = Auth::user();
//        $organizationId = $user->organization_id;
//        $organization = Organization::findOrFail($organizationId);
//        $organizationName = $organization->org_name;

        $states = State::pluck('state_name', 'state_code');
        $requester_types = Requester_type::pluck('type_name', 'id');
        $request_item_types = Request_item_type::pluck('item_name', 'id');
        $request_item_purpose = Request_item_purpose::pluck('purpose_name', 'id');
        $request_event_type = Request_event_type::pluck('type_name', 'id');
        return view('donationrequests.create')->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
            ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
    }

    public function edit($id)
    {
        $states = State::pluck('state_name', 'state_code');
        $requester_types = Requester_type::pluck('type_name', 'id');
        $request_item_types = Request_item_type::pluck('item_name', 'id');
        $request_item_purpose = Request_item_purpose::pluck('purpose_name', 'id');
        $request_event_type = Request_event_type::pluck('type_name', 'id');
        $donationrequest=DonationRequest::find($id);
        return view('donationrequests.edit', compact('donationrequest'))->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
            ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
//        return view('donationrequests.edit',compact('donationrequest', 'requester_types'));
    }




    public function update($id,Request $request)
    {

        $donationrequest= new DonationRequest($request->all());
        $donationrequest=DonationRequest::find($id);
        $donationrequest->update($request->all());
        return redirect('donationrequests');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */


    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
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
            'event_type' => 'required',
            'formAttendees' => 'required',
            'venue' => 'required',
            'marketingopportunities' => 'required'
        ]);
        //dd($request);
        if ($validator->fails())
        {
            return redirect('donationrequests') ->withErrors($validator)->withInput();
        }*/
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
        $donationRequest->dollar_amount = $request->dollar_amount;
        $donationRequest->item_purpose = $request->item_purpose;
        $donationRequest->needed_by_date = $request->needed_by_date;
        $donationRequest->event_name = $request->eventname;
        $donationRequest->event_start_date = $request->startdate;
        $donationRequest->event_end_date = $request->enddate;
        $donationRequest->event_type = $request->event_type;
        $donationRequest->est_attendee_count = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketing_opportunities = $request->marketingopportunities;
        $this->validate($request, [
       'needed_by_date' => 'after:today',
        ]);
        $donationRequest->save();
        if($request->hasFile('attachment')) {
            $file = new File();
            $file->donation_request_id = $donationRequest->id;
            $file->original_filename = $request->file('attachment')->getClientOriginalName();
            $file->file_path = Storage::putFile('public', $request->file('attachment') );
            $file->file_type='attachment';
      $file->save();
      // $attachment =$request->file('attachment');
      // $imageFileName = time() . '.' . $attachment->getClientOriginalExtension();
      // $s3 = \Storage::disk('s3');
      // $filePath = '/tagg-uno/' . $imageFileName;
      // $s3->put($filePath, file_get_contents($attachment), 'public');
      // $this->validate($request, [
      //     'attachment' => 'image|mimes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:2048',
      // ]);

      $imageName = time().'.'.$request->attachment->getClientOriginalExtension();
      $image = $request->file('attachment');
      $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
      $imageName = Storage::disk('s3')->url($imageName);
        // return $path;
        }
        //fire NewBusiness event to initiate sending welcome mail

        event(new DonationRequestReceived($donationRequest));

        return redirect('/');
    }

    public function show($id)
    {
        $donationrequest = DonationRequest::findOrFail($id);
        $event_purpose = Request_event_type::findOrFail($donationrequest->event_type);
        $event_purpose_name = $event_purpose->type_name;
//dd('180 :'.$id);
//dd('181 :'.$donationrequest->event_type);
        $donation_purpose = Request_item_purpose::findOrFail($donationrequest->item_purpose);
        $donation_purpose_name = $donation_purpose->purpose_name;
//dd('184: '.$id);
        $item_requested = Request_item_type::findOrFail($donationrequest->item_requested);
        $item_requested_name = $item_requested->item_name;
//dd('187: '.$donationrequest->item_requested);
        $donationRequest = Requester_type::findOrFail($donationrequest->requester_type);
        $donationRequestName = $donationRequest->type_name;
//dd('190: '.$donationrequest->requester_type);
        return view('donationrequests.show',compact('donationrequest', 'event_purpose_name', 'donation_purpose_name'
        , 'item_requested_name', 'donationRequestName'));
    }

    public function searchDonationRequest(Request $request) {

        $query = $request->q;
        $donationrequests = DonationRequest::where('requester', 'LIKE', "%$query%")->paginate(3);
        return view('donationrequests.index', compact('donationrequests'));
    }

    public function changeDonationStatus(Request $request) {
        
        $emailids = [];
        if ($request['status'] == 0) {
            $donation = DonationRequest::whereIn('id', $request['ids'])->update(['approval_status_id' => 5]);
            $acceptedrequests = DonationRequest::whereIn('id', $request['ids'])->get();

            foreach ($acceptedrequests as $acceptedrequest) {
                event(new TriggerAcceptEmailEvent($acceptedrequest));
                usleep(500000);
            }

        } elseif ($request['status'] == 1) {
            $donation = DonationRequest::whereIn('id', $request['ids'])->update(['approval_status_id' => 4]);
            $rejectedrequests = DonationRequest::whereIn('id', $request['ids'])->get();

            foreach ($rejectedrequests as $rejectedrequest) {
                event(new TriggerAcceptEmailEvent($rejectedrequest));
                usleep(500000);
            }
        }

        return response()->json(['idsArray' => $request['ids'], 'status' => $request['status']]);
    }
}
