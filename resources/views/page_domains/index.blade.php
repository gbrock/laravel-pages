@extends('gbrock.pages::app')

@section('content')
    <div class="page-header">
        <h1>Page Domains</h1>
        <div class="btn-group">
            <a href="{{ action('PageDomainController@getCreate') }}" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                New Domain
            </a>
        </div>
    </div>

    @if(count($rows))
        @foreach($rows as $row)
            <div class="">
                {{ $row->name }}
                {{--<a href="{{ action('PageDomainController@getShow', $row->id) }}">--}}
                    {{--<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>--}}
                {{--</a>--}}
                <a href="{{ action('PageDomainController@getUpdate', $row->id) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a href="{{ action('PageDomainController@getDestroy', $row->id) }}">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
            </div>
        @endforeach
        {!! $rows->render() !!}
    @else
        <div class="alert alert-info">
            There doesn't seem to be anything here.
        </div>
    @endif
@overwrite
