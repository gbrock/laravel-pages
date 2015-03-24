<?php
$namespace = 'Gbrock\Http\Controllers\\';

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
});
