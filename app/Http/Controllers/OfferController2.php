<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTraits;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController2 extends Controller
{
    use OfferTraits;
    public function create(){
        return view("ajax.create");
    }
    public function store(OfferRequest $request){
        $photo  =$this->upload($request->photo,'images/offers');
        $offer = Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $photo
        ]);

        if($offer){
           return response()->json([
                'status'=>true,
                'msg' => "Successfully Adde New Item",

           ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'msg' => "There Something Wrong",
           ]);
        }
    }
    public function show(){
        $data = Offer::select("id","name_".LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view("ajax.show")->with('offers',$data);
    }
    public function delete(Request $request){
        $select = Offer::whereId($request->id);
        if($select){
            $select->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Deleted Item Successfully',
                'id' => $request->id,
            ]);


        }else{
            return response()->json([
                'status' => true,
                'msg' => 'There are Somthing Wrong',
            ]);
        }

    }
    public function edit($id){
        $offer = Offer::whereId($id)->get();
        return view("ajax.edit")->with("offer",$offer);
    }
    public function update(OfferRequest $request){
        $photo  = $this->upload($request->photo,'images/offers');
        $offer = Offer::whereId($request->id);
        $offer->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $photo
        ]);
        if($offer){
            return response()->json([
                'status' => true,
                'msg' => 'Edit Item Successfully',
            ]);


        }else{
            return response()->json([
                'status' => true,
                'msg' => 'There are Somthing Wrong',
            ]);
        }

    }

}
