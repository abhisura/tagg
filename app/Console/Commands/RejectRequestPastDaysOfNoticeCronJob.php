<?php

namespace App\Console\Commands;

use App\DonationRequest;
use App\Events\SendAutoRejectEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


const REJECTED = 'Rejected';

const APPROVED = 'Approved';

class RejectRequestPastDaysOfNoticeCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:RejectRequestPastDaysOfNoticeCronJob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request status updated successfully.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("America/Belize");
        $expired_requests = new DonationRequest();

        DB::transaction(
            function () {
                $this->info(DATE(NOW()));

                $rejected_status_id_from_approval_statuses = DB::table('approval_statuses')->where('status_name', REJECTED)->value('id');
                $approved_status_id_in_approval_statuses = DB::table('approval_statuses')->where('status_name', APPROVED)->value('id');

                $expired_requests = DB::table('donation_requests')
                    ->join('donation_requests', 'organizations.id', '=', 'donation_requests.organization_id')
                    ->select('donation_requests.*')
                    ->where('needed_by_date - organizations.required_days_notice', '<=', date('Y-m-d'))
                    ->where('approval_status_id', '<>', $approved_status_id_in_approval_statuses)
                    ->where('approval_status_id', '<>', $rejected_status_id_from_approval_statuses)
                    ->get();
                print_r($expired_requests);

                if ($expired_requests != null){

                    //   $expired_requests = DonationRequest::where('needed_by_date', '<=', date('Y-m-d'))->wherenotin('approval_status_id', array(4, 5))->get();
                    // print_r($rejected_status_id_from_approval_statuses + $approved_status_id_in_approval_statuses);
                    // Update all expired requests.
                    DB::table('donation_requests')
                        ->where([
                            ['id', '=', $expired_requests . id]
                        ])
                        ->update(['approval_status_id' => $rejected_status_id_from_approval_statuses]);


                // Loop iterate over expired requests and send email to each requester
                foreach ($expired_requests as $expired_request) {
                    $this->info($expired_request->email);
                    event(new SendAutoRejectEmail($expired_request));
                    usleep(500000);
                    $this->info($expired_request->approval_status_id);
                }
                    Log::info('Expired Donation Requests Status Updated To REJECTED!');
                    $this->info('Expired Donation Requests Status Updated To REJECTED!');
            }else{
                    Log::info('No expired request available to update.');
                    $this->info('No expired request available to update.');
                }
                // $this->info(DATE(NOW()));
                // $this->info(date("Y-m-de"));
                // $expired_requests = DB::select('select * from donation_requests where needed_by_date <=  CURRENT_DATE ', [5000]);
                // print_r($expired_requests);
            });


    }
}
