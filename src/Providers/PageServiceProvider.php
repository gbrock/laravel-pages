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
    }

    /**
     * Bootstrap the application files.
     * @return void
     */
    public function boot()
    {
        $root = __DIR__.'/../../';

        // Load custom validation rules
        include $root . 'src/validation.php';

        // Load views
        $this->loadViewsFrom($root . 'resources/views', 'gbrock.pages');

        // Publish views
        $this->publishes([
            $root . 'resources/views' => base_path('resources/views/vendor/gbrock/pages'),
        ]);

        // Publish configuration
        $this->publishes([
            $root . 'config/pages.php' => config_path('gbrock-pages.php'),
        ]);

        // Publish migrations
        $this->publishes([
            $root . 'database/migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

}
