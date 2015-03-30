<?php namespace Gbrock\Pages\Repositories;

use Gbrock\Pages\Models\PageDomain;

class PageDomainRepository {

    public static function getAll()
    {
        return PageDomain::paginate();
    }
}
