<?php

namespace App\Console\Commands;

use App\Mail\notifyed;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notife:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $emails=User::select('email')->get();
       foreach ($emails as $email){
       Mail::to($email)->send(new notifyed($email));
       }
    }
}
