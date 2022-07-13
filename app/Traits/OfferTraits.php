<?php
namespace App\Traits;
use App\Models\Offer;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Trait OfferTraits {
    public function upload($photo,$folder){
        $file = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file;
        $photo->move($folder,$file_name);
        return $folder .'/'. $file_name;
    }
    public function redirectShow(){
        $data = Offer::select("id","name_".LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return redirect()->route("offers.show")->with("offers",$data);
    }
}
