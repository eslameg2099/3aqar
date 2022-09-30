<?php

namespace App\Models\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Pusher\Pusher;

trait UserHelpers
{
    /**
     * Determine whether the user type is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return User::ADMIN_TYPE == $this->type;
    }

    /**
     * Determine whether the user type is supervisor.
     *
     * @return bool
     */
    public function isSupervisor()
    {
        return User::SUPERVISOR_TYPE == $this->type;
    }

    /**
     * Determine whether the user type is customer.
     *
     * @return bool
     */
    public function isCustomer()
    {
        return User::CUSTOMER_TYPE == $this->type;
    }

    /**
     * Determine whether the user type is office owner.
     *
     * @return bool
     */
    public function isOfficeOwner()
    {
        return User::OFFICE_OWNER_TYPE == $this->type;
    }

    /**
     * Set the user type.
     *
     * @return $this
     */
    public function setType($type)
    {
        if (Gate::allows('updateType', $this)
            && in_array($type, array_keys(trans('users.types')))) {
            $this->forceFill([
                'type' => $type,
            ])->save();
        }

        return $this;
    }

    /**
     * Determine whether the user can access dashboard.
     *
     * @return bool
     */
    public function canAccessDashboard()
    {
        return $this->isAdmin() || $this->isSupervisor();
    }

    /**
     * The user profile image url.
     *
     * @return bool
     */
    public function getAvatar()
    {
        return $this->getFirstMediaUrl('avatars') ;
    }

    /**
     * Determine whither the user subscribed to the given pusher presence channel.
     *
     * @param $channelName
     * @throws \Pusher\PusherException
     * @return bool
     */
    public function subscribedToChannel($channelName)
    {
        $channelName = 'presence-'.trim('presence-', $channelName);

        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
        );
        $response = $pusher->get("/channels/{$channelName}/users");

        $users = [];

        if ($response && $response['status'] == 200) {
            $users = array_map(function ($user) {
                return $user->id;
            }, json_decode($response['body'])->users);
        }

        return in_array($this->getKey(), $users);
    }
}
