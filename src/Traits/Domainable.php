<?php namespace Gbrock\Pages\Traits;

use Gbrock\Pages\Scopes\IgnorePageDomainScope;
use Gbrock\Pages\Scopes\PageDomainScope;

trait Domainable {
    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootDomainable()
    {
        if(!empty(self::$domain))
        {
            static::addGlobalScope(new PageDomainScope);
        }

        if(!empty(self::$subdomains))
        {
            static::addGlobalScope(new IgnorePageDomainScope);
        }
    }

    public static function getPageDomain()
    {
        return !empty(static::$domain) ? trim(static::$domain, '\\/') : '';
    }

    public static function getPageSubdomains()
    {
        return !empty(static::$subdomains) ? static::$subdomains : [];
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
            $slug = $domain . '/' . $slug;
        }

        $this->attributes['slug'] = $slug;
    }
}
