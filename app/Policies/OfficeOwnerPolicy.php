<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OfficeOwner;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficeOwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any office owners.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.office_owners');
    }

    /**
     * Determine whether the user can view the office owner.
     *
     * @return mixed
     */
    public function view(User $user, OfficeOwner $officeOwner)
    {
        return $user->isAdmin()
            || $user->is($officeOwner)
            || $user->hasPermissionTo('manage.office_owners');
    }

    /**
     * Determine whether the user can create officeOwners.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.office_owners');
    }

    /**
     * Determine whether the user can update the office owner.
     *
     * @return mixed
     */
    public function update(User $user, OfficeOwner $officeOwner)
    {
        return (
                $user->isAdmin()
                || $user->is($officeOwner)
                || $user->hasPermissionTo('manage.office_owners')
            )
            && ! $this->trashed($officeOwner);
    }

    /**
     * Determine whether the user can update the type of the office owner.
     *
     * @return mixed
     */
    public function updateType(User $user, OfficeOwner $officeOwner)
    {
        return $user->isAdmin() && $user->isNot($officeOwner) || $user->hasPermissionTo('manage.office_owners');
    }

    /**
     * Determine whether the user can delete the office owner.
     *
     * @return mixed
     */
    public function delete(User $user, OfficeOwner $officeOwner)
    {
        return (
                $user->isAdmin()
                && $user->isNot($officeOwner)
                || $user->hasPermissionTo('manage.office_owners')
            )
            && ! $this->trashed($officeOwner);
    }

    /**
     * Determine whether the user can view trashed officeOwners.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.office_owners')
            )
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view trashed office owner.
     *
     * @return mixed
     */
    public function viewTrash(User $user, OfficeOwner $officeOwner)
    {
        return $this->view($user, $officeOwner) && $this->trashed($officeOwner);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, OfficeOwner $officeOwner)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.office_owners')
            )
            && $this->trashed($officeOwner);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, OfficeOwner $officeOwner)
    {
        return (
                $user->isAdmin()
                && $user->isNot($officeOwner)
                || $user->hasPermissionTo('manage.office_owners')
            )
            && $this->trashed($officeOwner)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given officeOwner is trashed.
     *
     * @param $officeOwner
     *
     * @return bool
     */
    public function trashed($officeOwner)
    {
        return $this->hasSoftDeletes() && method_exists($officeOwner, 'trashed') && $officeOwner->trashed();
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
            array_keys((new \ReflectionClass(OfficeOwner::class))->getTraits())
        );
    }
}
