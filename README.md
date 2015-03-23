# Laravel Pages
[![Made for Laravel 5](https://img.shields.io/badge/laravel-5.0-red.svg)]
(http://laravel.com/)
[![Latest Tag](https://img.shields.io/github/tag/gbrock/laravel-pages.svg)]
(https://github.com/gbrock/laravel-pages/releases)
[![Build Status](https://img.shields.io/travis/gbrock/laravel-pages.svg)]
(https://travis-ci.org/gbrock/laravel-pages)

A basic Laravel page CMS.  **This project is under active development.**

## Description

Laravel Pages is a templating, categorization, and publishing system for an 
application's pages.  It lets you implement WYSIWYG-esque content in very dynamic ways.

A **page** is a collection of HTML content,laid out in a *template* and assigned to a *domain*.
Pages must each be assigned exactly one template and at least one domain.  If published, a page can be access via a
public URL (determined by a combination of the domain and page's own slug).

A **template** is HTML defining the final document, including the positions of dynamic content (e.g. "title", "body",
"author")

A **domain** is a category of pages residing under a [slug](http://en.wikipedia.org/wiki/Semantic_URL#Slug) and
optionally permitting only specific templates.

The project is under active development, but the goal is to implement:

* migrations
* models
* validators
* views
* controllers
* assets / integration (CSS, CKEditor, javascript file uploads, and cropping mechanisms)

## License

[CKEditor](http://ckeditor.com/about/license) is used under the [Mozilla Public License](https://www.mozilla.org/MPL/).

All other code is licensed under the [MIT license](https://github.com/gbrock/laravel-pages/blob/master/LICENSE).
