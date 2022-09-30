<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "creating" event.
     *
     * @return void
     */
    public function creating(Order $order)
    {
        $order->forceFill(['published_at' => now()]);
    }
}
