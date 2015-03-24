<?php namespace Gbrock\Http\Controllers;

use Gbrock\Models\PageTemplate;
use Gbrock\Http\Requests\StorePageTemplateRequest;
use Gbrock\Repositories\PageTemplateRepository;
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
            'css' => [
                asset('vendor/gbrock/pages/codemirror/codemirror.css'), // CSS for the JS-based code editor
                asset('vendor/gbrock/pages/codemirror/theme/pastel-on-dark.css'), // Codemirror Theme
            ],
            'js' => [
                'https://code.jquery.com/jquery-1.11.2.min.js', // jQuery
                asset('vendor/gbrock/pages/codemirror/codemirror.js'), // The JS-based code editor
                asset('vendor/gbrock/pages/codemirror/mode/xml/xml.js'), // HTML mode for Codemirror
                asset('vendor/gbrock/pages/js/code-editor.js'), // Our initialization script
            ],
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
            'css' => [
                asset('vendor/gbrock/pages/codemirror/codemirror.css'), // CSS for the JS-based code editor
                asset('vendor/gbrock/pages/codemirror/theme/pastel-on-dark.css'), // Codemirror Theme
            ],
            'js' => [
                'https://code.jquery.com/jquery-1.11.2.min.js', // jQuery
                asset('vendor/gbrock/pages/codemirror/codemirror.js'), // The JS-based code editor
                asset('vendor/gbrock/pages/codemirror/mode/xml/xml.js'), // HTML mode for Codemirror
                asset('vendor/gbrock/pages/js/code-editor.js'), // Our initialization script
            ],
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
     * @param PageTemplate $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(PageTemplate $template)
    {
        $data = Input::only('name', 'body');

        $template->fill($data)->save();

        return redirect()->action('PageTemplateController@getIndex');
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
        $template->delete();

        return redirect()->action('PageTemplateController@getIndex');
    }
}
