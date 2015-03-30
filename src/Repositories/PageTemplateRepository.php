<?php namespace Gbrock\Pages\Repositories;

use Gbrock\Pages\Models\PageTemplate;

class PageTemplateRepository {

    public static function getAll()
    {
        return PageTemplate::paginate();
    }
}
