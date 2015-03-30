<?php namespace Gbrock\Pages\Http\Controllers;

use Gbrock\Pages\Models\Page;

class PageController extends BaseController {
    /**
     * Show all pages.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('gbrock.pages::pages.index', [
            'rows' => [],
        ]);
    }

    /**
     * Show the page creation form.
     *
     * @return \Illuminate\View\View
     */
    public function getCreate()
    {
        return view('gbrock.pages::pages.create', [
            'object' => new Page, // blank model so our forms have something to call
        ]);
    }

    /**
     * Show a preview of a page.
     *
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function getShow(Page $page)
    {
        return view('gbrock.pages::pages.show', [
            'object' => $page,
        ]);
    }

    /**
     * Show the page editing form.
     *
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function getUpdate(Page $page)
    {
        return view('gbrock.pages::pages.update', [
            'object' => $page,
        ]);
    }

    /**
     * Show the deletion confirmation.
     *
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function getDestroy(Page $page)
    {
        return view('gbrock.pages::pages.destroy', [
            'object' => $page,
        ]);
    }

    /**
     * Actually create a new page.
     * Validation has been handled by our service provider.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate()
    {
        return redirect()->action('');
    }

    /**
     * Actually save edits to a page.
     * Validation has been handled by our service provider.
     *
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(Page $page)
    {
        return redirect()->action('');
    }

    /**
     * Actually delete a page.
     * Validation has been handled by our service provider.
     *
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDestroy(Page $page)
    {
        return redirect()->action('');
    }
}
