@section('styles')
    {!! HTML::style(asset('vendor/gbrock/pages/codemirror/codemirror.css')) !!}
    {!! HTML::style(asset('vendor/gbrock/pages/codemirror/theme/pastel-on-dark.css')) !!}
@overwrite

@section('scripts')
    {!! HTML::script('https://code.jquery.com/jquery-1.11.2.min.js') !!}
    {!! HTML::script(asset('vendor/gbrock/pages/codemirror/codemirror.js')) !!}
    {!! HTML::script(asset('vendor/gbrock/pages/codemirror/mode/xml/xml.js')) !!}
    {!! HTML::script(asset('vendor/gbrock/pages/js/code-editor.js')) !!}
@overwrite

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
    <textarea name="body" class="form-control code-editor" id="pageTemplateBody" placeholder="Enter HTML content">{!! Input::old('body', $object->body) !!}</textarea>
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
