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

    @if(count($rows))
        @foreach($rows as $row)
            {{ $row->name }}
            <a href="{{ action('PageTemplateController@getUpdate', $row->id) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

        @endforeach
        {!! $rows->render() !!}
    @else
        <div class="alert alert-info">
            There doesn't seem to be anything here.
        </div>
    @endif
@overwrite
