<?php

namespace Gbrock\Pages\Traits;

trait Excerptable {

    public function getExcerptAttribute()
    {
        $content = $this->getAttribute($this->getExcerptField());
        return $this->makeExcerpt($content, $this->getExcerptCharacterLimit());
    }

    protected function getExcerptField()
    {
        return isset($this->excerptField) ? $this->excerptField : 'content';
    }

    protected function getExcerptCharacterLimit()
    {
        return isset($this->excerptCharacterLimit) ? (int) $this->excerptCharacterLimit : 140;
    }

    protected function makeExcerpt($html, $character_limit)
    {
        $words = strip_tags($html);
        $words = array_filter(preg_split("/\s+/", $words));

        $str = '';
        $check = '';

        while(strlen($check) < $character_limit)
        {
            if($check)
            {
                // add a space if this isn't the first word.
                $check .= ' ';
            }

            $str = $check;

            if(empty($words))
            {
                // No words left but we haven't hit our character limit!
                return $str;
            }

            $check .= array_shift($words);
        };

        return trim($str) . '&hellip;';
    }

}
