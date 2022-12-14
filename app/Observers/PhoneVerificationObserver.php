<?php

namespace App\Observers;

use App\Models\User;

class PhoneVerificationObserver
{
    /**
     * Handle the User "saving" event.
     *
     * @return void
     */
    public function saving(User $user)
    {
        if ($user->isDirty('phone')) {
            $user->forceFill(['phone_verified_at' => null]);
        }
    }
}
