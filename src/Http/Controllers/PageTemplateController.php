<?php namespace Gbrock\Http\Controllers;

class PageTemplateController extends BaseController {
    /**
     * Show all templates.
     */
    public function getIndex()
    {
        return view('gbrock.pages::page_templates.index');
    }

    /**
     * Show the template creation form.
     */
    public function getCreate()
    {
        return view('gbrock.pages::page_templates.create');
    }

    /**
     * Show a template preview.
     *
     * @param PageTemplate $template
     * @return \Illuminate\View\View
     */
    public function getShow(PageTemplate $template)
    {
        return view('gbrock.pages::page_templates.show', [
            'form_object' => $template,
        ]);
    }

    /**
     * Show the template editing form.
     *
     * @param PageTemplate $template
     * @return \Illuminate\View\View
     */
    public function getUpdate(PageTemplate $template)
    {
        return view('gbrock.pages::page_templates.update', [
            'form_object' => $template,
        ]);
    }

    /**
     * Show the deletion confirmation.
     *
     * @param PageTemplate $template
     * @return \Illuminate\View\View
     */
    public function getDestroy(PageTemplate $template)
    {
        return view('gbrock.pages::page_templates.destroy', [
            'form_object' => $template,
        ]);
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
     *
     * @param PageTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(PageTemplate $template)
    {
        return redirect()->action('');
    }

    /**
     * Actually delete a template.
     * Validation has been handled by our service provider.
     *
     * @param PageTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDestroy(PageTemplate $template)
    {
        return redirect()->action('');
    }
}
