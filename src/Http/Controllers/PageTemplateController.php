<?php namespace Gbrock\Http\Controllers;

use Gbrock\Models\PageTemplate;
use Gbrock\Http\Requests\StorePageTemplateRequest;
use Illuminate\Support\Facades\Input;

class PageTemplateController extends BaseController {
    /**
     * Show all templates.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('gbrock.pages::page_templates.index');
    }

    /**
     * Show the template creation form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('gbrock.pages::page_templates.create', [
            'object' => new PageTemplate, // blank model so our forms have something to call
        ]);
    }

    /**
     * Show a preview of a template.
     *
     * @param PageTemplate $template
     * @return \Illuminate\View\View
     */
    public function getShow(PageTemplate $template)
    {
        return view('gbrock.pages::page_templates.show', [
            'object' => $template,
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
            'object' => $template,
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
            'object' => $template,
        ]);
    }

    /**
     * Actually create a new template.
     * Validation has been handled by our service provider.
     *
     * @param StorePageTemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StorePageTemplateRequest $request)
    {
        $data = Input::only('name', 'body');
        $new = PageTemplate::create($data);

        dd($new);

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
