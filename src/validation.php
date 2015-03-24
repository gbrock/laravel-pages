<?php

Validator::extend('valid_html', function($attribute, $value, $parameters)
{
    $valid = true;

    try
    {
        // Use PHP to load the passed HTML string as a DOM Document.
        $dom = new DOMDocument();
        $dom->loadHTML($value);
    }
    catch(Exception $e)
    {
        $valid = false;
    }

    return $valid;
});
