<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
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
        return $user->isAdmin() || $user->hasPermissionTo('manage.types');
    }

    /**
     * Determine whether the user can view the type.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function view(User $user, Type $type)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.types');
    }

    /**
     * Determine whether the user can create types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.types');
    }

    /**
     * Determine whether the user can update the type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function update(User $user, Type $type)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.types'))
            && ! $this->trashed($type);
    }

    /**
     * Determine whether the user can delete the type.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function delete(User $user, Type $type)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.types'))
            && ! $this->trashed($type);
    }

    /**
     * Determine whether the user can view trashed types.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.types'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed type.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function viewTrash(User $user, Type $type)
    {
        return $this->view($user, $type)
            && $type->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function restore(User $user, Type $type)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.types'))
            && $this->trashed($type);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Type $type
     * @return mixed
     */
    public function forceDelete(User $user, Type $type)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.types'))
            && $this->trashed($type)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given type is trashed.
     *
     * @param $type
     * @return bool
     */
    public function trashed($type)
    {
        return $this->hasSoftDeletes() && method_exists($type, 'trashed') && $type->trashed();
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
            array_keys((new \ReflectionClass(Type::class))->getTraits())
        );
    }
}
