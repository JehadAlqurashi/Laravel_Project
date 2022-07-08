<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PDO;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Messages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::select("email")->get();
        foreach($users as $user){
            Mail::to($user)->send(new NotifyEmail());
        }
    }
}
