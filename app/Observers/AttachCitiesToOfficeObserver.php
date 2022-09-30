<?php

namespace App\Observers;

use App\Models\Office;

class AttachCitiesToOfficeObserver
{
    /**
     * Handle the Office "saved" event.
     *
     * @return void
     */
    public function saved(Office $office)
    {
        if ($office->city) {
            $office->cities()->sync($office->city->getModelWithParents());
        }
    }


   
}
