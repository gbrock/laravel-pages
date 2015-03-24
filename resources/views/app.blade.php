@extends('gbrock.pages::html5')

@section('wrapper')
    <div class="alert alert-warning text-center">
        This package is under active development!  Many features are still not implemented.  <a href="https://github.com/gbrock/laravel-pages"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> View on GitHub</a>
    </div>
    <div class="container">
        @include('gbrock.pages::includes.tabs')
        @yield('content')
    </div>
@overwrite
