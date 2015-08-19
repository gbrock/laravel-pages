<?php

namespace Gbrock\Pages\Tests\Cases;

use Gbrock\Pages\PageServiceProvider;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Boots the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../../vendor/laravel/laravel/bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        // Register our package's service provider
        $app->register(PageServiceProvider::class);

        // Set app configuration
        config([
            // 'key' => 'value',
        ]);

        return $app;
    }
}
