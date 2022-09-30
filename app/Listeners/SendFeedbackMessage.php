<?php

namespace App\Listeners;

use App\Events\FeedbackSent;

class SendFeedbackMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(FeedbackSent $event)
    {
    }
}
