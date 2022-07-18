<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthGuardsController extends Controller
{
    public function site(){
        return view('site');
    }
    public function admin(){
        return view('guards');
    }
}
