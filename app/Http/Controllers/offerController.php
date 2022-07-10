<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use PDO;

class offerController extends Controller
{

    public function getOffer(){
        return Offer::get();
    }
    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'name' => ['required','string','max:100'],
            'price'=> ['required','string','max:5'],
            'details'=>['required','string','max:150']
        ],[
            'name.required' => __('check.name required'),
            'price.required' => __('check.price required'),
            'details.required' => __('check.details required'),
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        Offer::create([
            'name' => $request->name,
            'price'=> $request->price,
            'details' => $request->details,
        ]);



    }
    public function show(){
        $users = User::select("email")->get();
        foreach($users as $user){
            return $user;
        }
    }

    public function create(){
        return view("offers.create");
    }


}
