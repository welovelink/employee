<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\TestQueue;
class SendEmail
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $data = [
            'email' => $event->email
        ];
        dispatch(new TestQueue($data));
        echo $event->email;
        echo "Called from Listeners, where you can write logic for sending email";
        exit;
    }
}
