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
    public function update(OfferRequest $request,$id){
        $photo =$this->upload($request->photo,'images/offers');
        Offer::whereId($id)->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $photo
        ]);
        $data = $this->redirectShow();
        return $data;

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

        $photo =$this->upload($request->photo,'images/offers');
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $photo
        ]);

        $data = $this->redirectShow();
        return $data;
    }
}
