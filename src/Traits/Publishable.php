<?php namespace Gbrock\Pages\Traits;

use Carbon\Carbon;

trait Publishable {

    private $basic_public_set = false;

    protected function getIsPublicAttribute()
    {
        if($this->public == 1 ||
            ($this->public_before && $this->public_before > new Carbon()) ||
            ($this->public_after && $this->public_after < new Carbon())
        )
        {
            return true;
        }

        return false;
    }

    protected function getPublicBeforeAttribute($value)
    {
        if($value)
        {
            return new Carbon($value);
        }
    }

    protected function getPublicAfterAttribute($value)
    {
        if($value)
        {
            return new Carbon($value);
        }
    }

    protected function getPublicStatusAttribute()
    {
        if($this->public_before)
        {
            return 'before';
        }
        elseif($this->public_after)
        {
            return 'after';
        }
        elseif($this->public)
        {
            return 'public';
        }

        return 'not_public';
    }

    protected function setPublicAttribute($value)
    {
        switch($value)
        {
            case 'not_public':
                $this->attributes['public'] = 0;
                break;
            case 'public':
                $this->attributes['public'] = 1;
                break;
        }

        if($value == 'not_public' || $value == 'public')
        {
            $this->basic_public_set = true;
            $this->attributes['public_after'] = null;
            $this->attributes['public_before'] = null;
        }
    }

    protected function setPublicAfterAttribute($value)
    {
        if($value && !$this->basic_public_set)
        {
            $this->attributes['public_after'] = $value;
            $this->attributes['public_before'] = null;
        }
    }

    protected function setPublicBeforeAttribute($value)
    {
        if($value && !$this->basic_public_set)
        {
            $this->attributes['public_after'] = null;
            $this->attributes['public_before'] = $value;
        }
    }

    public function scopePublished($query)
    {
        return $query->where(function($query)
        {
            $now = new Carbon(with(new Carbon)->format('Y-m-d') . ' 00:00:00');

            $query->where('public', '=', 1)
                ->orWhere('public_before', '>', $now)
                ->orWhere('public_after', '<', $now);
        });
    }

    public function scopeUnpublished($query)
    {
        return $query->where(function($query)
        {
            $now = new Carbon(with(new Carbon)->format('Y-m-d') . ' 00:00:00');

            $query->where('public', '=', 0)
                ->orWhere('public_before', '<', $now)
                ->orWhere('public_after', '>', $now);
        });
    }
}
