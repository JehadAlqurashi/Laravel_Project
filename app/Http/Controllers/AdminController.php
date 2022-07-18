<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

    public function panel(){
        return view('AdminAuth.login');
    }
    public function dashboard(){
        return "Hello Admin";
    }

        public function login(AdminLoginRequest $request)
        {

            // attempt to login user
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                // if successful, redirect to intended location
                return redirect()->intended(route('admin.dashboard'));
            };

            // if failed, redirect back with form data
            return redirect()->back()->with("message","Email Or Password Is Incorrect");
        }

}
