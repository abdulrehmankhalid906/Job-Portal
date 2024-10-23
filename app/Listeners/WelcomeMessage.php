<?php

namespace App\Listeners;

use App\Events\WelcomeEvent;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeMessage
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
    public function handle(WelcomeEvent $event): void
    {
        $event->user->notify(new WelcomeNotification());
    }
}
