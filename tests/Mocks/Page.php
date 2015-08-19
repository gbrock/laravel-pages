<?php

namespace Gbrock\Pages\Tests\Mocks;

use Gbrock\Pages\Models\Page as BasePage;

class Page extends BasePage
{
    protected static $subdomains = ['blog'];
}
