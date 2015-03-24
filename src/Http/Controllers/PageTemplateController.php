<?php namespace Gbrock\Http\Controllers;

class PageTemplateController extends BaseController {
    /**
     * Show all templates.
     */
    public function getIndex()
    {
        return view('gbrock.pages::index');
    }

    /**
     * Show a template preview.
     */
    public function getShow()
    {
        return view('gbrock.pages::show');
    }

    /**
     * Show the template creation form.
     */
    public function getCreate()
    {
        return view('gbrock.pages::create');
    }

    /**
     * Show the template editing form.
     */
    public function getUpdate()
    {
        return view('gbrock.pages::update');
    }

    /**
     * Show the deletion confirmation.
     */
    public function getDestroy()
    {
        return view('gbrock.pages::destroy');
    }

    /**
     * Actually create a new template.
     * Validation has been handled by our service provider.
     */
    public function postCreate()
    {
        return redirect()->action('');
    }

    /**
     * Actually save edits to a template.
     * Validation has been handled by our service provider.
     */
    public function postUpdate()
    {
        return redirect()->action('');
    }

    /**
     * Actually delete a template.
     * Validation has been handled by our service provider.
     */
    public function postDestroy()
    {
        return redirect()->action('');
    }
}
