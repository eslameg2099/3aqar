<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CategoryArcheticture;

use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;
class CategoryArcheticturePolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture');
    }

    public function view(User $user, CategoryArcheticture $categoryArcheticture)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture');
    }

    /**
     * Determine whether the user can create cities.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture');
    }

    /**
     * Determine whether the user can update the city.
     *
     * @return mixed
     */
    public function update(User $user, CategoryArcheticture $CategoryArcheticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture'))
            && ! $this->trashed($CategoryArcheticture);
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @return mixed
     */
    public function delete(User $user, CategoryArcheticture $CategoryArcheticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture'))
            && ! $this->trashed($CategoryArcheticture);
    }

    /**
     * Determine whether the user can view trashed cities.
     *
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed city.
     *
     * @param \App\Models\User|null $user
     *
     * @return mixed
     */
    public function viewTrash(User $user, CategoryArcheticture $CategoryArcheticture)
    {
        return $this->view($user, $CategoryArcheticture)
            && $city->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, CategoryArcheticture $CategoryArcheticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture'))
            && $this->trashed($CategoryArcheticture);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, CategoryArcheticture $CategoryArcheticture)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.CategoryArcheticture'))
            && $this->trashed($CategoryArcheticture)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given city is trashed.
     *
     * @param $city
     *
     * @return bool
     */
    public function trashed($CategoryArcheticture)
    {
        return $this->hasSoftDeletes() && method_exists($CategoryArcheticture, 'trashed') && $CategoryArcheticture->trashed();
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
            array_keys((new \ReflectionClass(CategoryArcheticture::class))->getTraits())
        );
    }
  
}
