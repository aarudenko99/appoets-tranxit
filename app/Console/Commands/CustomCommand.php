<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Http\Controllers\SendPushNotification;
use App\Http\Controllers\AdminController;
use Carbon\Carbon;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rides';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating the Scheduled Rides Timing';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $UserRequest = DB::table('user_requests')->where('status','SCHEDULED')
                        ->where('schedule_at','<=',\Carbon\Carbon::now()->addMinutes(5))
                        ->get();


        if(!empty($UserRequest)){
            foreach($UserRequest as $ride){
                DB::table('user_requests')
                        ->where('id',$ride->id)
                        ->update(['status' => 'STARTED', 'assigned_at' =>Carbon::now() , 'schedule_at' => null ]);


                $hour =  \Carbon\Carbon::now()->subHour();
                $futurehours = \Carbon\Carbon::now()->addMinutes(5);
                $date =  \Carbon\Carbon::now();           

                \Log::info("Schedule Service Request Started.".$date."==".$hour."==".$futurehours);

                 //scehule start request push to user
                (new SendPushNotification)->user_schedule($ride->user_id);
                 //scehule start request push to provider
                (new SendPushNotification)->provider_schedule($ride->provider_id);

                DB::table('provider_services')->where('provider_id',$ride->provider_id)->update(['status' =>'riding']);
            }
        }

        $CustomPush = DB::table('custom_pushes')
                        ->where('schedule_at','<=',\Carbon\Carbon::now()->addMinutes(5))
                        ->get();

        if(!empty($CustomPush)){
            foreach($CustomPush as $Push){
                DB::table('custom_pushes')
                        ->where('id',$Push->id)
                        ->update(['schedule_at' => null ]);

                // sending push
                (new AdminController)->SendCustomPush($Push->id);
            }
        }

                \Log::info("Schedule Service Reminder test." . \Carbon\Carbon::now()->addMinutes(45)->toDateTimeString());

        $UserRequest = DB::table('user_requests')->where('status','SCHEDULED')
                        ->whereNull('reminder_sent')
                        ->where('schedule_at','<=',\Carbon\Carbon::now()->addMinutes(45))
                        ->get();


        if(!empty($UserRequest)){
            foreach($UserRequest as $ride){

                DB::table('user_requests')
                        ->where('id',$ride->id)
                        ->update(['reminder_sent' => '1']);
                
                 //scehule reminder request push to provider
                (new SendPushNotification)->provider_reminder($ride->provider_id, $ride->schedule_at);
            }
        }

    }
}
