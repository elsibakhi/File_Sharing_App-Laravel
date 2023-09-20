<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class logUserDownloads
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
    public function handle(object $event): void
    {
      
        $event->file->logs()->create([
            "ip_address"=>$event->request->ip(),
            "user_agent"=>$event->request->userAgent(),
        ]);
    }
}
