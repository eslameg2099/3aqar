<?php

namespace App\Observers;

use App\Models\EngineeringOffice;
class EngineeringOfficeObserver
{
    /**
     * Handle the Contractor "saved" event.
     *
     * @return void
     */
    public function saved(EngineeringOffice $EngineeringOffice)
    {
        $EngineeringOffice->cities()->sync($EngineeringOffice->city->getModelWithParents());
    }
}