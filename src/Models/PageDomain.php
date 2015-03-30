<?php namespace Gbrock\Pages\Models;

use Gbrock\Pages\Traits\SanitizeSlugTrait;
use Illuminate\Database\Eloquent\Model;

class PageDomain extends Model {

    use SanitizeSlugTrait;

    /**
     * The attributes which are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'default_meta_description', 'slug'];

    /**
     * The relationship to the pages under this domain.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('Gbrock\Pages\Models\Page', 'domain_id');
    }

    /**
     * The relation to the templates available to this domain.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function templates()
    {
        return $this->belongsToMany('Gbrock\Pages\Models\PageTemplate', 'page_domain_template', 'domain_id', 'template_id');
    }
}
