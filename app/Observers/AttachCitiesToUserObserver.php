<?php

namespace App\Observers;

use App\Models\User;

class AttachCitiesToUserObserver
{
    /**
     * Handle the User "saved" event.
     *
     * @return void
     */
    public function saved(User $user)
    {
        if ($user->city) {
            $user->cities()->sync($user->city->getModelWithParents());
        }
    }
}
