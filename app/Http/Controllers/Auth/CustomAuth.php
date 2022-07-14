<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAuth extends Controller
{
    public function __construct()
    {
        $this->middleware(["CheckAge","verified"]);
    }
    public function adult(){
        return view('CustomAuth.index');
    }
}
