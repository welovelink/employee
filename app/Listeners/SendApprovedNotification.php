<?php

namespace App\Listeners;

use App\Events\LeaveApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ApprovedLeaveNotifyJob;
class SendApprovedNotification
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
     * @param  \App\Events\LeaveApproved  $event
     * @return void
     */
    public function handle(LeaveApproved $event)
    {
        dispatch(new ApprovedLeaveNotifyJob($event->leaveId));
    }
}
