<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\JobInProgressEvent' => [
            'App\Listeners\AddToHistoryListener',
             // App\Listeners\NotifyClient
        ],
        'App\Events\JobDoneEvent' => [
            'App\Listeners\UpdateYachtStatusListener',
            // App\Listeners\NotifyClientToPickUpBoat
        ],
    ];
}
