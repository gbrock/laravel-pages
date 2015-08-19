<?php

namespace Gbrock\Pages\Tests\Mocks;

use Gbrock\Pages\Models\Page;
use Gbrock\Pages\Traits\Domainable;

class BlogPage extends Page {

    use Domainable;

    protected static $domain = 'blog';

}

