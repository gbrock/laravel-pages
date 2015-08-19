<?php

namespace Gbrock\Pages\Tests;

use Gbrock\Pages\Tests\Cases\DatabaseTestCase;
use Gbrock\Pages\Tests\Mocks\Page;

class PageTest extends DatabaseTestCase
{
    function test_it_can_create_a_page()
    {
        Page::create([
            'title' => 'Hello, Test',
        ]);

        $this->seeInDatabase('pages', ['title' => 'Hello, Test']);
    }

    function test_page_is_available_publicly()
    {
        Page::create([
            'title' => 'Beam Me Up',
            'slug' => 'about',
            'content' => '<p>All About Grungions</p>',
            'public' => true,
        ]);

        $this->visit('/about')->see('All About Grungions');
    }
}
