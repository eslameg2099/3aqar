<?php

namespace App\Observers;

use App\Models\Estate;

class AttachCitiesToEstateObserver
{
    /**
     * Handle the Estate "saved" event.
     *
     * @return void
     */
    public function saved(Estate $estate)
    {
       
        $estate->cities()->sync($estate->city->getModelWithParents());
        
    }
}
