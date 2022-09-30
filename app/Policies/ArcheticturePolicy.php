<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Archeticture;

use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;
class ArcheticturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any types.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.Archeticture');
    }

    public function view(User $user, Archeticture $Archeticture)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.Archeticture');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.Archeticture');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, Archeticture $Archeticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Archeticture'))
            && ! $this->trashed($Archeticture);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, Archeticture $Archeticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Archeticture'))
            && ! $this->trashed($Archeticture);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Archeticture'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, Archeticture $Archeticture)
    {
        return $this->view($user, $Archeticture)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Archeticture $Archeticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Archeticture'))
            && $this->trashed($Archeticture);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Archeticture $Archeticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Archeticture'))
            && $this->trashed($Archeticture)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($Archeticture)
    {
        return $this->hasSoftDeletes() && method_exists($Archeticture, 'trashed') && $Archeticture->trashed();
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
            array_keys((new \ReflectionClass(Archeticture::class))->getTraits())
        );
    }
  
}
