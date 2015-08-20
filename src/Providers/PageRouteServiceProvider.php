<?php

namespace Gbrock\Pages\Providers;

use Gbrock\Pages\Models\Page;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

class PageRouteServiceProvider extends RouteServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        if(count(config('pages.domains')))
        {
            foreach(config('pages.domains') as $domain => $class)
            {
                $this->registerGetRoute($router, $domain, $class);
            }
        }

        $this->registerGetRoute($router, '', config('pages.model'));
    }

    /**
     * Adds a route for a given domain, or none at all.
     *
     * @param $router
     * @param $domain
     * @param $class
     */
    private function registerGetRoute($router, $domain, $class)
    {
        $domain = $domain ? trim($domain, '\\/') : '';

        $router->get($domain . '/{slug?}', function ($slug) use ($domain, $class) {
            $page = $class::published()
                ->where('slug', ($domain ? $domain . '/' : '') . $slug)
                ->first();

            if(!$page)
            {
                return abort(404);
            }

            return $page->render();
        })->where('slug', '.+');
    }
}
