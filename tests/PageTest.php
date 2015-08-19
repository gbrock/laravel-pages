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

    function test_page_is_public()
    {
        Page::create([
            'title'   => 'Beam Me Up',
            'slug'    => 'about',
            'content' => '<p>All About Grungions</p>',
            'public'  => true,
        ]);

        $this->visit('/about')->see('All About Grungions');
    }

    function test_page_excerpts()
    {
        $htmlContent = "<p><strong>Mr. and Mrs. Dursley</strong>, of number four, Privet Drive, were proud to say " .
            " that they were perfectly normal, thank you very much.  They were the last people you'd expect to be " .
            " involved in anything strange or mysterious, because they just didn't hold with such nonsense.</p>";

        $expectedExcerpt = "Mr. and Mrs. Dursley, of number four, Privet Drive, were proud to say that they were" .
            " perfectly normal, thank you very much. They were the&hellip;";

        $page = Page::create([
            'content' => $htmlContent,
        ]);

        $this->assertEquals($expectedExcerpt, $page->excerpt);
    }

    function test_page_publishing()
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
