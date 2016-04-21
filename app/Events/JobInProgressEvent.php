<?php

namespace App\Events;

use App\Job;
use App\Task;

class JobInProgressEvent extends Event
{
    public $job;
    public $task;

    public function __construct(Job $job, Task $task)
    {
        $this->job = $job;
        $this->task = $task;
    }
}
