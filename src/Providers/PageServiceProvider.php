<?php namespace Gbrock\Providers;

use Gbrock\Pages;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('gbrock.pages', function($app)
        {
            return new Pages($app['config']['gbrock']['pages']);
        });
    }

    /**
     * Bootstrap the application files.
     * @return void
     */
    public function boot()
    {
        require_once(__DIR__.'/src/validation.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gbrock.pages');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/gbrock/pages'),
        ]);

        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('gbrock-pages.php'),
        ]);

        // Publish migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

}
