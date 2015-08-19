<?php namespace Gbrock\Pages\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait as Sluggable;
use Gbrock\Pages\Traits\Domainable;
use Gbrock\Pages\Traits\Excerptable;
use Gbrock\Pages\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements SluggableInterface {

    use Sluggable,
        SoftDeletes,
        Publishable,
        Domainable,
        Excerptable;

    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['title', 'slug', 'meta_description', 'content', 'public', 'public_before', 'public_after'];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'public' => 'boolean',
        'public_before' => 'date',
        'public_after' => 'date',
    ];

    protected $dates = [
        'public_before',
        'public_after',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * How to generate the model's slug.
     * @var array
     */
    protected $sluggable = [
        'build_from' => ['title'],
        'method' => [self::class, 'generateSlug'],
    ];

    protected function generateSlug($string, $separator = '-')
    {
        $result = strtolower(preg_replace('/[^a-z0-9\-_\/]+/i', $separator, $string));
        $result = trim($result, '-');
        return preg_replace('/\/\-/', '/', $result);
    }

    /**
     * Limit a query to a specific "domain", or folder structure.
     *
     * @param $query
     * @param string $domain
     * @return mixed
     */
    public function scopeSlugDomain($query, $domain)
    {
        $domainQuery = str_replace("*", '%', $domain);

        return $query->where('slug', 'like', $domainQuery);
    }

    /**
     * Render the page using the default view.
     *
     * @param bool $viewFile
     * @return \Illuminate\View\View
     */
    public function render($viewFile = false)
    {
        return view($viewFile ?: config('pages.template'), [
            'page' => $this,
        ]);
    }
}
