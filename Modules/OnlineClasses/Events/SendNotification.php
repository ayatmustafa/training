<?php

namespace Modules\OnlineClasses\Events;

use Illuminate\Queue\SerializesModels;

class SendNotification
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $onlineClass;

    public function __construct($onlineClass)
    {
        $this->user = $onlineClass;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
