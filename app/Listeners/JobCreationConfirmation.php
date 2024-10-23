<?php

namespace App\Listeners;

use App\Events\JobCreated;
use App\Notifications\JobCreationMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobCreationConfirmation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobCreated $event): void
    {
        $event->user->notify(new JobCreationMessage());
    }
}
