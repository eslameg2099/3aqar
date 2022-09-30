<?php

namespace App\Observers;

use App\Models\Order;

class AttachCitiesToOrderObserver
{
    /**
     * Handle the Order "saved" event.
     *
     * @return void
     */
    public function saved(Order $order)
    {
        $order->cities()->sync($order->city->getModelWithParents());
    }
}
