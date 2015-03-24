<?php namespace Gbrock\Repositories;

use Gbrock\Models\PageTemplate;

class PageTemplateRepository {

    public static function getAll()
    {
        return PageTemplate::paginate();
    }
}
