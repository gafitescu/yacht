<?php

namespace App\Listeners;

use App\Events\JobInProgressEvent;
use App\History;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class AddToHistoryListener
{
    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(JobInProgressEvent $event)
    {
        $history = new History();
        $history->job_id = $event->job->id;
        $history->task_id = $event->task->id;
        $history->save();
    }
}
