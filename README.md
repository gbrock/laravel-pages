# Pages [![Build Status](https://travis-ci.org/gbrock/laravel-pages.svg?branch=rewrite)](https://travis-ci.org/gbrock/laravel-pages)

A [Laravel 5.1](http://laravel.com/docs/5.1) package designed to add pages to your Laravel application.  A page is just
**content** defined by specific URL, or **slug**.  A page may or may not be **published**.

## Installation
1. Run `composer require gbrock/laravel-pages` from your project directory.
1. Add the service provider to the `providers` array in `config/app.php`:  
    `Gbrock\Pages\Providers\PageServiceProvider::class,`

1. Publish the migrations, views, and config file:  
    `php artisan vendor:publish --provider="Gbrock\Pages\Providers\ContactableServiceProvider"`
    
1. Run the migrations:  
    `php artisan migrate`

## Usage

### Creating a Public Page
Create a **Page** model:

```php
\Gbrock\Pages\Models\Page::create([
    'title' => 'Hello, World',
    'content' => '<p>Hi everybody</p>',
    'public' => true,
]);
```

...which is now accessible by browsing to `/hello-world`!

### Making a Domain
A **domain** is a set of pages which are always under a specific slug.  For example, you might make a "BlogPage" model
whose members are always accessible under `blog/{slug}`:

```php
<?php

namespace App;

use Gbrock\Pages\Models\Page;
use Gbrock\Pages\Traits\Domainable;

class BlogPage extends Page {

    use Domainable;

    protected static $domain = 'blog';

}
```

Then you can query that model for only that domain of pages.  **Please note** that, by default, domained pages will be
included in queries when using the above Page model.  In order to ignore domained pages, extend the included Page model
and add ignorable domains to the `$subdomains` property:

```php
<?php

namespace App;

use Gbrock\Pages\Models\Page as BasePage;

class Page extends BasePage
{
    protected static $subdomains = ['blog'];
}
```
