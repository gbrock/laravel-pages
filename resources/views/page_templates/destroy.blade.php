@extends('gbrock.pages::app')

@section('content')
    <div class="page-header">
        <h1>Delete &ldquo;{{ $object->name }}&rdquo;</h1>
    </div>
    <form action="{{ action('PageTemplateController@postDestroy', $object->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p><span class="lead">Are you sure you want to delete &ldquo;{{ $object->name }}&rdquo;?</span>  This action cannot be undone.</p>

        <div class="text-right">
            <a class="btn btn-link" href="{{ URL::previous() }}">
                No, cancel
            </a>
            <button class="btn btn-danger" type="submit">
                Yes, delete &ldquo;{{ $object->name }}&rdquo;
            </button>
        </div>
    </form>

@overwrite
