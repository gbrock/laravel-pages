<?php namespace Gbrock\Pages\Models;

use Gbrock\Table\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model {

    use Sortable;

    /**
     * The attributes which are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'body'];

    /**
     * The attributes which may be sorted against.
     * @var array
     */
    protected $sortable = ['name'];

    /**
     * The relationship to the pages using this template.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('Gbrock\Pages\Models\Page', 'template_id');
    }

    /**
     * The relation to the templates available to this domain.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domains()
    {
        return $this->belongsToMany('Gbrock\Pages\Models\PageDomain', 'page_domain_template', 'template_id', 'domain_id');
    }
}
