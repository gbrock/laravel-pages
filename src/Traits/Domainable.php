<?php namespace Gbrock\Pages\Traits;

use Gbrock\Pages\Scopes\IgnorePageDomainScope;
use Gbrock\Pages\Scopes\PageDomainScope;

trait Domainable {
    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootPageDomain()
    {
        if(defined('static::PAGE_DOMAIN'))
        {
            static::addGlobalScope(new PageDomainScope);
        }

        if(!empty(self::$pageSubdomains))
        {
            static::addGlobalScope(new IgnorePageDomainScope);
        }
    }

    public static function getPageDomain()
    {
        return !empty(static::$pageDomain) ? static::$pageDomain : '';
    }

    public static function getPageSubdomains()
    {
        return !empty(static::$pageSubdomains) ? static::$pageSubdomains : [];
    }

    public function getForcedDomainAttribute()
    {
        return $this->getPageDomain();
    }

    protected function getSlugWithoutDomainAttribute()
    {
        $slug = $this->slug;
        $domain = $this->getPageDomain();

        if (substr($slug, 0, strlen($domain)) == $domain)
        {
            $slug = substr($slug, strlen($domain));
        }

        return $slug;
    }

    protected function setSlugAttribute($slug)
    {
        $domain = $this->getPageDomain();

        if (substr($slug, 0, strlen($domain)) != $domain)
        {
            $slug = $domain . $slug;
        }

        $this->attributes['slug'] = $slug;
    }
}
