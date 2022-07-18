<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RelationsController extends Controller
{
    public function oneToone(){
        $user  = User::with(["phone"=>function($q){
            $q->select("code","phone","user_id");
        }])->find('1');
        return $user;

    }

}
