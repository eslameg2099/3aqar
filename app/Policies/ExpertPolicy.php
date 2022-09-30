<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Expert;

use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertPolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.experts');
    }

    public function view(User $user, Expert $Expert)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.experts');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.experts');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, Expert $Expert)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.experts'))
            && ! $this->trashed($Expert);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, Expert $Expert)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.experts'))
            && ! $this->trashed($Expert);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.experts'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, Expert $Expert)
    {
        return $this->view($user, $Expert)
            && $Expert->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Expert $Expert)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.experts'))
            && $this->trashed($Expert);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Expert $Expert)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.experts'))
            && $this->trashed($Expert)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($Expert)
    {
        return $this->hasSoftDeletes() && method_exists($Expert, 'trashed') && $Expert->trashed();
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
            array_keys((new \ReflectionClass(Expert::class))->getTraits())
        );
    }
  
}
