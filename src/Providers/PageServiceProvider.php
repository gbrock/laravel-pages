<?php

namespace Gbrock\Pages\Providers;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/pages.php', 'pages'
        );

        $this->app->register(\Cviebrock\EloquentSluggable\SluggableServiceProvider::class);
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        // Publish configuration
        $this->publishes([
            __DIR__.'/../../config/pages.php' => config_path('pages.php'),
        ], 'config');

        // Publish migrations
        $this->publishes([
            __DIR__.'/../Migrations/' => database_path('migrations')
        ], 'migrations');

        // Load views
//        $this->loadViewsFrom(__DIR__.'/../../resources/views/', 'contactable');
    }
}
