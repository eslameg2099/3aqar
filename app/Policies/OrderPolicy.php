<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any orders.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.orders');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.orders');
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.orders');
    }

    /**
     * Determine whether the user can update the order.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders'))
            && ! $this->trashed($order);
    }

    /**
     * Determine whether the user can republish the order.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function republish(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders') || $user->is($order->user))
            && ! $this->trashed($order);
    }

    /**
     * Determine whether the user can lock the order.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function lock(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders') || $user->is($order->user))
            && ! $this->trashed($order);
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders'))
            && ! $this->trashed($order);
    }

    /**
     * Determine whether the user can view trashed orders.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed order.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function viewTrash(User $user, Order $order)
    {
        return $this->view($user, $order)
            && $order->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders'))
            && $this->trashed($order);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Order $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.orders'))
            && $this->trashed($order)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given order is trashed.
     *
     * @param $order
     * @return bool
     */
    public function trashed($order)
    {
        return $this->hasSoftDeletes() && method_exists($order, 'trashed') && $order->trashed();
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
            array_keys((new \ReflectionClass(Order::class))->getTraits())
        );
    }
}
