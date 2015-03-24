<?php namespace Gbrock\Providers;

use Gbrock\Models\PageTemplate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $root = __DIR__.'/../../';

        include $root . 'src/Http/routes.php';

        Route::bind('page_template', function($value)
        {
            $found = PageTemplate::where('slug', $value)->first();

            if(!$found)
            {
                // Slug not present.
                throw new NotFoundHttpException;
            }

            return $found;
        });
    }
}
