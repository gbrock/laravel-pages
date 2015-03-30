<?php
$namespace = 'Gbrock\Pages\Http\Controllers\\';

Route::group(['prefix' => 'pages'], function() use ($namespace)
{
    Route::get('/', $namespace . 'PageController@getIndex');

    Route::get('templates', $namespace . 'PageTemplateController@getIndex');
    Route::get('templates/new', $namespace . 'PageTemplateController@getCreate');
    Route::post('templates/new', $namespace . 'PageTemplateController@postCreate');
//    Route::get('templates/{page_template}', $namespace . 'PageTemplateController@getShow');
    Route::get('templates/{page_template}/edit', $namespace . 'PageTemplateController@getUpdate');
    Route::post('templates/{page_template}/edit', $namespace . 'PageTemplateController@postUpdate');
    Route::get('templates/{page_template}/delete', $namespace . 'PageTemplateController@getDestroy');
    Route::post('templates/{page_template}/delete', $namespace . 'PageTemplateController@postDestroy');


    Route::get('domains', $namespace . 'PageDomainController@getIndex');
    Route::get('domains/new', $namespace . 'PageDomainController@getCreate');
    Route::post('domains/new', $namespace . 'PageDomainController@postCreate');
//    Route::get('domains/{page_domain}', $namespace . 'PageDomainController@getShow');
    Route::get('domains/{page_domain}/edit', $namespace . 'PageDomainController@getUpdate');
    Route::post('domains/{page_domain}/edit', $namespace . 'PageDomainController@postUpdate');
    Route::get('domains/{page_domain}/delete', $namespace . 'PageDomainController@getDestroy');
    Route::post('domains/{page_domain}/delete', $namespace . 'PageDomainController@postDestroy');
});
