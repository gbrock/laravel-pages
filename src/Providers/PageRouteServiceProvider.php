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
        $router->get('{slug?}', function ($slug) {
            return Page::where('slug', $slug)
                ->firstOrFail()
                ->render();
        })->where('pageSlug', '.+');
    }
}
