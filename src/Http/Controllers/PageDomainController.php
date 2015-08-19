<?php namespace Gbrock\Pages\Http\Controllers;

use Gbrock\Pages\Models\PageDomain;
use Gbrock\Pages\Http\Requests\StorePageDomainRequest;
use Gbrock\Pages\Models\PageTemplate;
use Gbrock\Pages\Repositories\PageDomainRepository;

use Gbrock\Pages\Repositories\PageTemplateRepository;
use Illuminate\Support\Facades\Input;

class PageDomainController extends BaseController {
    /**
     * Show all domains.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('gbrock.pages::page_domains.index', [
            'rows' => PageDomainRepository::getAll(),
        ]);
    }

    /**
     * Show the domain creation form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('gbrock.pages::page_domains.create', [
            'page_templates' => PageTemplateRepository::getAll(),
            'object' => new PageDomain, // blank model so our forms have something to call
        ]);
    }

    /**
     * Show the members of a domain. Currently unwanted.
     *
     * @param PageDomain $domain
     * @return \Illuminate\View\View
     */
//    public function getShow(PageDomain $domain)
//    {
//        return view('gbrock.pages::page_domains.show', [
//            'object' => $domain,
//        ]);
//    }

    /**
     * Show the domain editing form.
     *
     * @param PageDomain $domain
     * @return \Illuminate\View\View
     */
    public function getUpdate(PageDomain $domain)
    {
        return view('gbrock.pages::page_domains.update', [
            'page_templates' => PageTemplateRepository::getAll(),
            'object' => $domain,
        ]);
    }

    /**
     * Show the deletion confirmation.
     *
     * @param PageDomain $domain
     * @return \Illuminate\View\View
     */
    public function getDestroy(PageDomain $domain)
    {
        return view('gbrock.pages::page_domains.destroy', [
            'object' => $domain,
        ]);
    }

    /**
     * Actually create a new domain.
     * Validation has been handled by our service provider.
     *
     * @param StorePageDomainRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(StorePageDomainRequest $request)
    {
        $data = Input::only('name', 'default_meta_description', 'slug');

        $domain = PageDomain::create($data);

        // Save the valid templates
        $templates = PageTemplate::whereIn('id', Input::get('templates'))->get()->all();
        $domain->templates()->saveMany($templates);

        return redirect()->action('PageDomainController@getIndex');
    }

    /**
     * Actually save edits to a domain.
     * Validation has been handled by our service provider.
     *
     * @param StorePageDomainRequest $request
     * @param PageDomain $domain
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(StorePageDomainRequest $request, PageDomain $domain)
    {
        $data = Input::only('name', 'default_meta_description', 'slug');

        $domain->fill($data)->save();

        // Remove current templates
        $domain->templates()->detach();

        // Save the valid templates
        $templates = PageTemplate::whereIn('id', Input::get('templates'))->get()->all();
        $domain->templates()->saveMany($templates);

        return redirect()->action('PageDomainController@getIndex');
    }

    /**
     * Actually delete a domain.
     * Validation has been handled by our service provider.
     *
     * @param PageDomain $domain
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDestroy(PageDomain $domain)
    {
        // Remove current templates
        $domain->templates()->detach();

        $domain->delete();

        return redirect()->action('PageDomainController@getIndex');
    }
}
