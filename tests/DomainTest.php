<?php

namespace Gbrock\Pages\Tests;

use Gbrock\Pages\Tests\Cases\DatabaseTestCase;
use Gbrock\Pages\Tests\Mocks\BlogPage;
use Gbrock\Pages\Tests\Mocks\Page;

class DomainTest extends DatabaseTestCase
{
    public function test_domained_pages_can_be_created()
    {
        BlogPage::create([
            'title'   => 'Hello, World',
            'content' => '<p>Hi everybody</p>',
            'public'  => true,
        ]);

        $this->visit('/blog/hello-world')->see('Hi everybody');
    }

    public function test_domained_pages_are_not_regular_pages()
    {
        BlogPage::create([
            'title' => 'Not a Page',
        ]);

        Page::create([
            'title' => 'Yes a Page',
        ]);

        $allPages = Page::all();

        $this->assertNotContains('Not a Page', $allPages->lists('title'));
    }

    public function test_regular_pages_are_not_domained_pages()
    {
        Page::create([
            'title' => 'Yes a Page',
        ]);

        BlogPage::create([
            'title' => 'Not a Page',
        ]);

        $blogPages = BlogPage::all();

        $this->assertNotContains('Yes a Page', $blogPages->lists('title'));
    }
}
