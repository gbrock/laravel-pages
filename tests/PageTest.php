<?php

namespace Gbrock\Pages\Tests;

use Gbrock\Pages\Models\Page;
use Gbrock\Pages\Tests\Cases\DatabaseTestCase;

class PageTest extends DatabaseTestCase
{
    function test_it_can_create_a_page()
    {
        $page = Page::create([
            'title' => 'Hello, Test',
        ]);

        $this->seeInDatabase('pages', ['title' => 'Hello, Test']);
    }
}
