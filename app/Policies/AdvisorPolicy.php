<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advisor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvisorPolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.advisors');
    }

    public function view(User $user,$advisor)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.advisors');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.advisors');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, Advisor $advisor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.advisors'))
            && ! $this->trashed($advisor);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, Advisor $advisor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.advisors'))
            && ! $this->trashed($advisor);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.advisors'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, Advisor $advisor)
    {
        return $this->view($user, $advisor)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Advisor $advisor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.advisors'))
            && $this->trashed($advisor);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Advisor $advisor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.advisors'))
            && $this->trashed($advisor)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($advisor)
    {
        return $this->hasSoftDeletes() && method_exists($advisor, 'trashed') && $advisor->trashed();
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
            array_keys((new \ReflectionClass(Advisor::class))->getTraits())
        );
    }
  
}
