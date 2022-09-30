<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pusher\Pusher
 * @method static array|bool get($path, $params = [])
 */
class Pusher extends Facade
{
    /**
     * Get the registered name of the pusher.
     *
     * @return string
     * @see \App\Providers\PusherServiceProvider
     */
    protected static function getFacadeAccessor()
    {
        return 'Pusher';
    }
}
