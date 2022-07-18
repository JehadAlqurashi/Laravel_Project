<?php

namespace App\Listeners;
use App\Events\VideoView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PhpParser\Node\Expr\FuncCall;

class IncreaseCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoView $event)
    {
        if(session()->has("view")){
            $this->update($event->video);

        }
    }
    public function update($video){
        $video->view += 1;
        $video->save();
        session();
    }
}
