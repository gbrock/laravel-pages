<?php namespace Gbrock\Pages\Http\Controllers;

use Gbrock\Pages\Models\PageTemplate;
use Gbrock\Pages\Http\Requests\StorePageTemplateRequest;
use Gbrock\Pages\Repositories\PageTemplateRepository;

use Illuminate\Support\Facades\Input;

class PageTemplateController extends BaseController {
    /**
     * Show all templates.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('gbrock.pages::page_templates.index', [
            'rows' => PageTemplateRepository::getAll(),
        ]);
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
     * Show a preview of a template.  Currently unwanted.
     *
     * @param PageTemplate $template
     * @return \Illuminate\View\View
     */
//    public function getShow(PageTemplate $template)
//    {
//        return view('gbrock.pages::page_templates.show', [
//            'object' => $template,
//        ]);
//    }

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

        PageTemplate::create($data);

        return redirect()->action('PageTemplateController@getIndex');
    }

    /**
     * Actually save edits to a template.
     * Validation has been handled by our service provider.
     *
     * @param StorePageTemplateRequest $request
     * @param PageTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(StorePageTemplateRequest $request, PageTemplate $template)
    {
        $data = Input::only('name', 'body');

        $template->fill($data)->save();

        return redirect()->action('PageTemplateController@getIndex');
    }

    /**
     * Actually delete a template.
     *
     * @param PageTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDestroy(PageTemplate $template)
    {
        // Remove current domains
        $template->domains()->detach();

        $template->delete();

        return redirect()->action('PageTemplateController@getIndex');
    }
}
