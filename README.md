# Laravel Pages
[![Made for Laravel 5](https://img.shields.io/badge/laravel-5.0-red.svg)]
(http://laravel.com/)
[![Latest Tag](https://img.shields.io/github/tag/gbrock/laravel-pages.svg)]
(https://github.com/gbrock/laravel-pages/releases)
<!--[![Build Status](https://img.shields.io/travis/gbrock/laravel-pages.svg)]
(https://travis-ci.org/gbrock/laravel-pages)-->

A basic Laravel page CMS.  **This project is under development.**

## Description

**Laravel Pages** is a templating, categorization, and publishing system for an 
application's pages.  It lets you implement WYSIWYG-esque content in various dynamic ways.

A **page** is a collection of HTML content, laid out in a *template* and assigned to a *domain*.
Pages must each be assigned exactly one template and one domain.  If published, a page can be access via a
public URL (determined by a combination of the domain's and page's slugs).

A **template** is the HTML defining the final document, including the positions of dynamic content (e.g. "sidebar", 
"post_content", "about_author")

A **domain** is a category of pages residing under a [slug](http://en.wikipedia.org/wiki/Semantic_URL#Slug) and
optionally permitting only specific templates to be used for its pages.

## Roadmap

1. Develop and document...
    * migrations (implemented, need tests)
    * models (implemented, need tests)
    * validators (implemented, need tests)
    * views (in progress)
    * controllers (in progress)
    * assets / integration: CSS, CKEditor, javascript file uploads, and cropping mechanisms (in progress)
2. Get everything fully tested
3. Publish examples

## Installation

1. Require the package in your `composer.json` file:
    ```php
"gbrock/laravel-pages": "dev-master"
```

1. Update packages:
    ```
composer update
```

1. Add the service provider(s) to `config/app.php`:
   ```php
'Gbrock\Providers\PageServiceProvider',
'Gbrock\Providers\RouteServiceProvider', // Optional; registers routes for sample implementation
```

1. Publish the views, assets, and migrations:
    ```
php artisan vendor:publish
```

1. Run the migrations:
    ```
php artisan migrate
```

If you installed the sample implementation, you can now access it by browsing `/pages` in your application.  Otherwise, set about implementing the page functionality into a larger application (documentation needed).


## License

[CKEditor](http://ckeditor.com/about/license) is used under the [Mozilla Public License](https://www.mozilla.org/MPL/).

All other code is licensed under the [MIT license](https://github.com/gbrock/laravel-pages/blob/master/LICENSE).
