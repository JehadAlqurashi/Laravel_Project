<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends BaseController
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }
    public function callback($service){
        return Socialite::with($service)->user();
    }
}
