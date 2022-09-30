<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Estate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any estates.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.estates');
    }

    /**
     * Determine whether the user can view the estate.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function view(User $user, Estate $estate)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.estates');
    }

    /**
     * Determine whether the user can create estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isOfficeOwner();
    }

    /**
     * Determine whether the user can update the estate.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function update(User $user, Estate $estate)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.estates'))
            && ! $this->trashed($estate);
    }

    /**
     * Determine whether the user can delete the estate.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function delete(User $user, Estate $estate)
    {
        if ($user->is($estate->user)) {
            return true;
        }

        return ($user->isAdmin() || $user->hasPermissionTo('manage.estates'))
            && ! $this->trashed($estate);
    }

    /**
     * Determine whether the user can view trashed estates.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.estates'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed estate.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function viewTrash(User $user, Estate $estate)
    {
        return $this->view($user, $estate)
            && $estate->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function restore(User $user, Estate $estate)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.estates'))
            && $this->trashed($estate);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estate $estate
     * @return mixed
     */
    public function forceDelete(User $user, Estate $estate)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.estates'))
            && $this->trashed($estate)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given estate is trashed.
     *
     * @param $estate
     * @return bool
     */
    public function trashed($estate)
    {
        return $this->hasSoftDeletes() && method_exists($estate, 'trashed') && $estate->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Estate::class))->getTraits())
        );
    }
}
