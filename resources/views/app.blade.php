@extends('gbrock.pages::html5')

@section('wrapper')
    <div class="container">
        @include('gbrock.pages::includes.tabs')
        @yield('content')
    </div>
@overwrite
