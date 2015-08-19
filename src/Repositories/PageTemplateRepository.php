<?php namespace Gbrock\Pages\Repositories;

use Table;
use Gbrock\Pages\Models\PageTemplate;

class PageTemplateRepository {

    public static function getAll()
    {
        return PageTemplate::get();
    }


    public static function getTable()
    {
        return PageTemplate::sorted()->paginate();
    }
}
