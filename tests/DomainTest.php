<?php

namespace Gbrock\Pages\Tests;

use Gbrock\Pages\Tests\Cases\DatabaseTestCase;
use Gbrock\Pages\Tests\Mocks\BlogPage;

class DomainTest extends DatabaseTestCase
{
    /**
     * @group domain
     */
    public function test_domained_pages_can_be_created()
    {
        $page = BlogPage::create([
            'title' => 'Hello, World',
            'content' => '<p>Hi everybody</p>',
            'public' => true,
        ]);

        $this->visit('/blog/hello-world')->see('Hi everybody');
    }
}
