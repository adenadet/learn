<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Network\Check;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class NetworkChecks extends Command
{

    protected $signature = 'network:checks';

    protected $description = 'Check that all networks are currently available';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \Log::info("Cron is working fine!");
        
        $checks = Check::all();

        foreach ($checks as $check){
            $response = null;
            system("ping ". $check->ip_address, $response);
            if($response == 0){
                $check->last_active_time = date('Y-m-d H:i:s');
                $check->last_check_time = date('Y-m-d H:i:s');
                $check->status = 1;
                $ready = Http::get('http://lms.saintnicholashospital.com/api/icms/checked/'.$check->id.'?stat=1');
            }
            else{
                $check->last_check_time = date('Y-m-d H:i:s');
                $check->status = 0;

                $ready = Http::get('http://lms.saintnicholashospital.com/api/icms/checks/'.$check->id.'?stat=2');
            }

            $check->save();
        }

        $this->info('Network:Checks Cummand Run successfully!');

        //return $body['status'];
        return 0;
    }
}
