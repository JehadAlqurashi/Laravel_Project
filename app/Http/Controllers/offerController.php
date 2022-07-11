<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use PDO;

class offerController extends Controller
{

    public function store(OfferRequest $request){

        // $validate = Validator::make($request->all(),[
        //     'name' => ['required','string','max:100'],
        //     'price'=> ['required','string','max:5'],
        //     'details'=>['required','string','max:150']
        // ],);
        // if($validate->fails()){
        //     return redirect()->back()->withErrors($validate);
        // }
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price'=> $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        return redirect()->back()->with("message","I generated all users");



    }
    public function show(){

        $offers = Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name','price','details_' .LaravelLocalization::getCurrentLocale().' as details '  )->get();
        return view("offers.show",compact('offers'));

    }

    public function create(){
        return view("offers.create");
    }


}
