<?php

namespace App\Events;

use App\Job;

class JobDoneEvent extends Event
{
    public $job;


    public function __construct(Job $job)
    {
        $this->job = $job;
    }
}
