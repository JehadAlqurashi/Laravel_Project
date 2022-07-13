<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTraits;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class offerController extends Controller
{
    use OfferTraits;
    public function create(){
        return view("offers.create");
    }
    public function show(){

        $data = Offer::select("id","name_".LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view("offers.show")->with('offers',$data);
    }

    public function edit($id){
        $data = Offer::whereId($id)->get();
        return view("offers.edit")->with("data",$data);

    }
    public function delete($id){
        $delete = Offer::find($id);
        if(!$delete){
            return redirect()->back->with("error","item Not Found");
        }
        $delete->delete();
        return redirect()->back()->with("success","Deleted Item Successfully");
    }
    public function store(OfferRequest $request){

        $this->upload($request->photo,'images/offers');
        Offer::create($request->all());
        $data = Offer::select("id","name_".LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return redirect()->route("offers.show")->with("offers",$data);

    }
}
