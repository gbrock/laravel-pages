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
        if(!empty(static::$domain))
        {
            static::addGlobalScope(new PageDomainScope);
        }

        if(!empty(static::$subdomains))
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
        $subdomains = !empty(static::$subdomains) ? static::$subdomains : [];
        $domain = static::getPageDomain();

        $subdomains = array_map(function ($value) use ($domain) {
            return ($domain ? $domain . '/' : '') . $value;
        }, $subdomains);

        return $subdomains;
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
            $slug = substr($slug, strlen($domain) + 1);
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

        $this->attributes['slug'] = preg_replace('/\/+/', '/', trim($slug, '\\/'));
    }
}
