<?php

namespace App\Observers;

use App\Models\Advisor;
class AttachCitiesToAdvisorObserver
{
    /**
     * Handle the Contractor "saved" event.
     *
     * @return void
     */
    public function saved(Advisor $Advisor)
    {
        $Advisor->cities()->sync($Advisor->city->getModelWithParents());
    }

   
}