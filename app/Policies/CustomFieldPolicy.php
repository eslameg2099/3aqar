<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CustomField;

use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomFieldPolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.CustomField');
    }

    public function view(User $user, $id)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.CustomField');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.CustomField');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, CustomField $CustomField)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CustomField'))
            && ! $this->trashed($CustomField);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, CustomField $CustomField)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CustomField'))
            && ! $this->trashed($CustomField);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CustomField'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, CustomField $CustomField)
    {
        return $this->view($user, $CustomField)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, CustomField $CustomField)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CustomField'))
            && $this->trashed($CustomField);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, CustomField $CustomField)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CustomField'))
            && $this->trashed($CustomField)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($CustomField)
    {
        return $this->hasSoftDeletes() && method_exists($CustomField, 'trashed') && $CustomField->trashed();
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
            array_keys((new \ReflectionClass(CustomField::class))->getTraits())
        );
    }
  
}
