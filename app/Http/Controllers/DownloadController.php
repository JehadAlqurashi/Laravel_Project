<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file){
        $file = htmlspecialchars($file);
        return $file;
    }
}
