<?php namespace Gbrock\Models;

use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model {

    /**
     * The attributes which are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'body'];

    /**
     * The relationship to the pages using this template.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('Gbrock\Models\Page', 'template_id');
    }
}