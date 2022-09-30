<?php

namespace App\Observers;

use App\Models\Expert;
class AttachCitiesToExpertObserver
{
    /**
     * Handle the Contractor "saved" event.
     *
     * @return void
     */
    public function saved(Expert $expert)
    {

        $expert->cities()->sync($expert->city->getModelWithParents());
    }
}