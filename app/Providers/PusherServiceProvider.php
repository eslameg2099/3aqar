<?php

namespace App\Providers;

use Pusher\Pusher;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class PusherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Pusher', function () {
            return new Pusher(
                Config::get('broadcasting.connections.pusher.key'),
                Config::get('broadcasting.connections.pusher.secret'),
                Config::get('broadcasting.connections.pusher.app_id'),
                Config::get('broadcasting.connections.pusher.options', [])
            );
        });

    }

    
}
