<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Report;

use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.report');
    }

    public function view(User $user, Report $Report)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.report');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.report');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, Report $Report)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.report'))
            && ! $this->trashed($Report);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, Report $Report)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.report'))
            && ! $this->trashed($Report);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.report'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, Report $Report)
    {
        return $this->view($user, $Report)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Report $Report)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.report'))
            && $this->trashed($Report);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Advisor $Report)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.report'))
            && $this->trashed($AdviReportsor)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($Report)
    {
        return $this->hasSoftDeletes() && method_exists($Report, 'trashed') && $Report->trashed();
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
