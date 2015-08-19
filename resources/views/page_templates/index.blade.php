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

    {!! $table->addColumn('links', '&nbsp;', function($row) {
        return '<a href="' . action('PageTemplateController@getUpdate', $row->id) . '"><span class="glyphicon glyphicon-pencil"></span>Edit</a>';
    }) !!}
    {!! $table->render() !!}
@overwrite
