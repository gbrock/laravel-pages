<?php namespace Gbrock\Providers;

use Gbrock\Models\PageDomain;
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

        Route::model('page_template', 'Gbrock\Models\PageTemplate');
        Route::bind('page_domain', function($value)
        {
            $found = PageDomain::where('slug', $value)->first();

            if(!$found)
            {
                // Slug not present.
                throw new NotFoundHttpException;
            }

            return $found;
        });
    }
}
