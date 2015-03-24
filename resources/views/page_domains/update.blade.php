@extends('gbrock.pages::app')

@section('content')
    <div class="page-header">
        <h1>Edit &ldquo;{{ $object->name }}&rdquo;</h1>
    </div>
    <form action="{{ action('PageDomainController@postUpdate', $object->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('gbrock.pages::page_domains.form')
    </form>
@overwrite
