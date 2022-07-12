<?php

namespace App\Http\Controllers;

use App\Events\VideoView;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function view(){
       $view =  Video::first();
       event(new VideoView($view));
        return view('video') ->with('view',$view);
    }
}
