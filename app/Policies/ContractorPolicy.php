<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contractor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContractorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any contractors.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.contractors');
    }

    /**
     * Determine whether the user can view the contractor.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function view(User $user, Contractor $contractor)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.contractors');
    }

    /**
     * Determine whether the user can create contractors.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.contractors');
    }

    /**
     * Determine whether the user can update the contractor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function update(User $user, Contractor $contractor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.contractors'))
            && ! $this->trashed($contractor);
    }

    /**
     * Determine whether the user can delete the contractor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function delete(User $user, Contractor $contractor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.contractors'))
            && ! $this->trashed($contractor);
    }

    /**
     * Determine whether the user can view trashed contractors.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.contractors'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed contractor.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function viewTrash(User $user, Contractor $contractor)
    {
        return $this->view($user, $contractor)
            && $contractor->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function restore(User $user, Contractor $contractor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.contractors'))
            && $this->trashed($contractor);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Contractor $contractor
     * @return mixed
     */
    public function forceDelete(User $user, Contractor $contractor)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.contractors'))
            && $this->trashed($contractor)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given contractor is trashed.
     *
     * @param $contractor
     * @return bool
     */
    public function trashed($contractor)
    {
        return $this->hasSoftDeletes() && method_exists($contractor, 'trashed') && $contractor->trashed();
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
            array_keys((new \ReflectionClass(Contractor::class))->getTraits())
        );
    }
}
