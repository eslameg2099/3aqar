<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cities.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.cities');
    }

    /**
     * Determine whether the user can view the city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function view(User $user, City $city)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.cities');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.cities');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.cities'))
            && ! $this->trashed($city);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.cities'))
            && ! $this->trashed($city);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.cities'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, City $city)
    {
        return $this->view($user, $city)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, City $city)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.cities'))
            && $this->trashed($city);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, City $city)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.cities'))
            && $this->trashed($city)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($city)
    {
        return $this->hasSoftDeletes() && method_exists($city, 'trashed') && $city->trashed();
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
            array_keys((new \ReflectionClass(City::class))->getTraits())
        );
    }
}
