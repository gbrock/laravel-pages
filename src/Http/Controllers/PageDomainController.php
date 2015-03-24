<?php namespace Gbrock\Http\Controllers;

use Gbrock\Models\PageDomain;

class PageDomainController extends BaseController {
    /**
     * Show all domains.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('gbrock.pages::page_domains.index');
    }

    /**
     * Show the domain creation form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('gbrock.pages::page_domains.create', [
            'object' => new PageDomain, // blank model so our forms have something to call
        ]);
    }

    /**
     * Show the members of a domain.
     *
     * @param PageDomain $domain
     * @return \Illuminate\View\View
     */
    public function getShow(PageDomain $domain)
    {
        return view('gbrock.pages::page_domains.show', [
            'object' => $domain,
        ]);
    }

    /**
     * Show the domain editing form.
     *
     * @param PageDomain $domain
     * @return \Illuminate\View\View
     */
    public function getUpdate(PageDomain $domain)
    {
        return view('gbrock.pages::page_domains.update', [
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate()
    {
        return redirect()->action('');
    }

    /**
     * Actually save edits to a domain.
     * Validation has been handled by our service provider.
     *
     * @param PageDomain $domain
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(PageDomain $domain)
    {
        return redirect()->action('');
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
        return redirect()->action('');
    }
}
