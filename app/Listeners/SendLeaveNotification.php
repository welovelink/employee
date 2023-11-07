<?php

namespace App\Listeners;

use App\Events\LeaveCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLeaveNotification
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
     * @param  \App\Events\LeaveCreated  $event
     * @return void
     */
    public function handle(LeaveCreated $event)
    {
        //
    }
}
