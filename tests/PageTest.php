<?php

namespace Gbrock\Pages\Tests;

use Carbon\Carbon;
use Gbrock\Pages\Tests\Cases\DatabaseTestCase;
use Gbrock\Pages\Tests\Mocks\Page;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PageTest extends DatabaseTestCase
{
    function test_it_can_create_a_page()
    {
        Page::create(['title' => 'Hello, Test']);

        $this->seeInDatabase('pages', ['title' => 'Hello, Test']);
    }

    function test_page_is_available_publicly()
    {
        Page::create([
            'title'   => 'Beam Me Up',
            'slug'    => 'about',
            'content' => '<p>All About Grungions</p>',
            'public'  => true,
        ]);

        $this->visit('/about')->see('All About Grungions');
    }

    function test_page_publishing_reacts_properly()
    {
        Page::create(['title' => 'Terra', 'public' => true]);
        Page::create(['title' => 'Locke', 'public_after' => $this->today('-1 day')]);
        Page::create(['title' => 'Edgar', 'public_before' => $this->today('+1 day')]);
        Page::create(['title' => 'Sabin', 'public_after' => $this->today('+1 day')]);

        $publishedPages = Page::published()->get();
        $slugs = $publishedPages->lists('slug');

        // Terra is always public.
        $this->assertContains('terra', $slugs);

        // Locke has been public since yesterday.
        $this->assertContains('locke', $slugs);

        // Edgar is public until tomorrow.
        $this->assertContains('edgar', $slugs);

        // Sabin isn't public until tomorrow.
        $this->assertNotContains('sabin', $slugs);
    }

    function today($modifier = '')
    {
        return with(new Carbon)->modify($modifier ?: '+0 seconds');
    }
}
