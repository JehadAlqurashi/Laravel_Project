<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class exp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:exp';

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
        $users=User::where('exp',0)->get();
        foreach ($users as $user){
            $user->update(['exp'=>'1']);
        }
        return 0;

    }
}
