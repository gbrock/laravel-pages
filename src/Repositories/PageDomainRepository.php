<?php namespace Gbrock\Repositories;

use Gbrock\Models\PageDomain;

class PageDomainRepository {

    public static function getAll()
    {
        return PageDomain::paginate();
    }
}
