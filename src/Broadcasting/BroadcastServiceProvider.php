<?php

namespace Illuminate\Broadcasting;

use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $compile = [
            'files' => [
                __DIR__.'/Broadcasters/Broadcaster.php',
                __DIR__.'/Broadcasters/LogBroadcaster.php',
                __DIR__.'/Broadcasters/NullBroadcaster.php',
                __DIR__.'/Broadcasters/PusherBroadcaster.php',
                __DIR__.'/Broadcasters/RedisBroadcaster.php',
                __DIR__.'/BroadcastController.php',
                __DIR__.'/BroadcastEvent.php',
                __DIR__.'/BroadcastManager.php',
                __DIR__.'/BroadcastServiceProvider.php',
                __DIR__.'/Channel.php',
                __DIR__.'/InteractsWithSockets.php',
                __DIR__.'/PendingBroadcast.php',
                __DIR__.'/PresenceChannel.php',
                __DIR__.'/PrivateChannel.php',
                __DIR__.'/../Contracts/Broadcaster.php',
                __DIR__.'/../Contracts/Factory.php',
                __DIR__.'/../Contracts/ShouldBroadcast.php',
                __DIR__.'/../Contracts/ShouldBroadcastNow.php',
                __DIR__.'/../Facades/Broadcast.php',
            ],
            'providers' => [
                self::class,
            ],
        ];
        $this->app['config']->set('compile', $compile);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Illuminate\Broadcasting\BroadcastManager', function ($app) {
            return new BroadcastManager($app);
        });

        $this->app->singleton('Illuminate\Contracts\Broadcasting\Broadcaster', function ($app) {
            return $app->make('Illuminate\Broadcasting\BroadcastManager')->connection();
        });

        $this->app->alias(
            'Illuminate\Broadcasting\BroadcastManager', 'Illuminate\Contracts\Broadcasting\Factory'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'Illuminate\Broadcasting\BroadcastManager',
            'Illuminate\Contracts\Broadcasting\Factory',
            'Illuminate\Contracts\Broadcasting\Broadcaster',
        ];
    }
}
