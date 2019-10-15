<?php
namespace Bilaliqbalr\Athena;

use Illuminate\Support\ServiceProvider;

class AthenaServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__.'/../config/athena.php' => config_path('athena.php')],
            'athena'
        );

        Model::setConnectionResolver($this->app['db']);

        Model::setEventDispatcher($this->app['events']);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->resolving('db', function ($db) {
            $db->extend('athena', function ($config) {
                return new Connection($config);
            });
        });
    }

}
