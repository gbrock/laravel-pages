<?php namespace Gbrock\Pages\Models;

use Gbrock\Pages\Traits\SanitizeSlugTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    use SanitizeSlugTrait;

    /**
     * The attributes which are mass assignable.
     * @var array
     */
    protected $fillable = ['slug', 'title', 'meta_description', 'content'];
}
