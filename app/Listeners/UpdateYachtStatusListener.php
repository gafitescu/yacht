<?php

namespace App\Listeners;

use App\Events\JobDoneEvent;
use App\Yacht;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class UpdateYachtStatusListener
{
    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(JobDoneEvent $event)
    {
        $yacht = $event->job->yacht;
        $yacht->status = Yacht::SAILING;
        $yacht->save();
    }
}
