<?php namespace Gbrock\Pages\Traits;

trait SanitizeSlugTrait {

    /**
     * When the slug is set, sanitize it.
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $value = preg_replace('/\/\/+/', '/', $value); // crush double+ slashes
        $value = trim($value, '/'); // trim outer slashes
        $value = strtolower($value); // lowercase it
        $value = preg_replace('/[^a-z0-9\/-_]/', '', $value); // replace all but the valid characters

        if($value === '')
        {
            $value = null;
        }

        $this->attributes['slug'] = $value;
    }
}
