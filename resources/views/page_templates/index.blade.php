@extends('gbrock.pages::app')

@section('content')
    <div class="page-header">
        <h1>Page Templates</h1>
        <div class="btn-group">
            <a href="{{ action('PageTemplateController@getCreate') }}" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                New Template
            </a>
        </div>
    </div>
@overwrite
