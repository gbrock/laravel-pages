@extends('gbrock.pages::app')

@section('content')
    <div class="page-header">
        <h1>New Domain</h1>
    </div>
    <form action="{{ action('PageDomainController@postCreate') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('gbrock.pages::page_domains.form')
    </form>
@overwrite
