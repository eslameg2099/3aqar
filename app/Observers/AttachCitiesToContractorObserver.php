<?php

namespace App\Observers;

use App\Models\Contractor;

class AttachCitiesToContractorObserver
{
    /**
     * Handle the Contractor "saved" event.
     *
     * @return void
     */
    public function saved(Contractor $contractor)
    {
        $contractor->cities()->sync($contractor->city->getModelWithParents());
    }
}
