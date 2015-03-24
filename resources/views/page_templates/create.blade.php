@extends('gbrock.pages::app')

@section('content')
    <br>
    <form action="{{ action('PageTemplateController@postCreate') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group{{ $errors->first('name') ? ' has-error' : '' }}">
            <label for="pageTemplateName">Name</label>
            <input type="text" name="name" class="form-control" id="pageTemplateName" placeholder="Enter name" value="{{ Input::old('name', $object->name) }}">
            @if($errors->first('name'))
                <div class="help-block">
                    {!! $errors->first('name') !!}
                </div>
            @endif
        </div>

        <div class="form-group{{ $errors->first('body') ? ' has-error' : '' }}">
            <label for="pageTemplateBody">Body</label>
            <textarea name="body" class="form-control" id="pageTemplateBody" placeholder="Enter HTML content">{!! Input::old('body', $object->body) !!}</textarea>
            @if($errors->first('body'))
                <div class="help-block">
                    {!! $errors->first('body') !!}
                </div>
            @endif
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                Save {{ $object->name or 'Template' }}
            </button>
        </div>
    </form>
@overwrite
