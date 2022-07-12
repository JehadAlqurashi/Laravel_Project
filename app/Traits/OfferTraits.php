<?php
namespace App\Traits;

Trait OfferTraits {
    public function upload($photo,$folder){
        $file = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file;
        $photo->move($folder,$file_name);
        return $folder . $file_name;
    }
}
