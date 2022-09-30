<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EngineeringOffice;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class EngineeringOfficePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any engineering offices.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices');
    }

    /**
     * Determine whether the user can view the engineering office.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function view(User $user, EngineeringOffice $engineering_office)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices');
    }

    /**
     * Determine whether the user can create engineering offices.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices');
    }

    /**
     * Determine whether the user can update the engineering office.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function update(User $user, EngineeringOffice $engineering_office)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices'))
            && ! $this->trashed($engineering_office);
    }

    /**
     * Determine whether the user can delete the engineering office.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function delete(User $user, EngineeringOffice $engineering_office)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices'))
            && ! $this->trashed($engineering_office);
    }

    /**
     * Determine whether the user can view trashed engineering_offices.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed engineering_office.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function viewTrash(User $user, EngineeringOffice $engineering_office)
    {
        return $this->view($user, $engineering_office)
            && $engineering_office->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function restore(User $user, EngineeringOffice $engineering_office)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices'))
            && $this->trashed($engineering_office);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return mixed
     */
    public function forceDelete(User $user, EngineeringOffice $engineering_office)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.engineering_offices'))
            && $this->trashed($engineering_office)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given engineering_office is trashed.
     *
     * @param $engineering_office
     * @return bool
     */
    public function trashed($engineering_office)
    {
        return $this->hasSoftDeletes() && method_exists($engineering_office, 'trashed') && $engineering_office->trashed();
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
            array_keys((new \ReflectionClass(EngineeringOffice::class))->getTraits())
        );
    }
}
