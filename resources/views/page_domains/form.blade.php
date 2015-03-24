<div class="form-group{{ $errors->first('name') ? ' has-error' : '' }}">
    <label for="pageDomainName">Name</label>
    <input type="text" name="name" class="form-control" id="pageDomainName" placeholder="Enter name" value="{{ Input::old('name', $object->name) }}">
    @if($errors->first('name'))
        <div class="help-block">
            {!! $errors->first('name') !!}
        </div>
    @endif
</div>

<div class="form-group{{ $errors->first('default_meta_description') ? ' has-error' : '' }}">
    <label for="pageDomainDescription">Description</label>
    <textarea name="default_meta_description" class="form-control" id="pageDomainDescription" placeholder="Enter description (optional)">{!! Input::old('default_meta_description', $object->default_meta_description) !!}</textarea>
    @if($errors->first('description'))
        <div class="help-block">
            {!! $errors->first('default_meta_description') !!}
        </div>
    @endif
</div>

<div class="form-group{{ $errors->first('slug') ? ' has-error' : '' }}">
    <label for="pageDomainSlug">Slug</label>
    <div class="input-group">
        <div class="input-group-addon">
            {{ str_replace(['http://', 'https://'], '', Request::root()) . '/' }}
        </div>
        <input type="text" name="slug" class="form-control" id="pageDomainSlug" placeholder="Enter slug" value="{{ Input::old('slug', $object->slug) }}">
    </div>
    <div class="help-block">
        Lowercase, numbers, <code>/</code>, <code>-</code>, and <code>_</code> characters only.
        @if($errors->first('slug'))
            {!! $errors->first('slug') !!}
        @endif
    </div>
</div>

<div class="form-group{{ $errors->first('templates') ? ' has-error' : '' }}">
    <label for="pageDomainTemplates">Limit to Templates</label>
    <select class="form-control" name="templates[]" multiple id="pageDomainTemplates">
        @if(count($page_templates))
            @foreach($page_templates as $template)
                <option value="{{ $template->id }}"{{ in_array($template->id, Input::old('templates', array_keys($object->templates->getDictionary()))) ? ' selected="selected"' : '' }}>{{ $template->name }}</option>
            @endforeach
        @else
            <option disabled>No templates available.</option>
        @endif
    </select>
    @if(count($page_templates))
        <div class="help-block">
            If none are selected, all will be available on this domain.
            @if($errors->first('templates'))
                {!! $errors->first('templates') !!}
            @endif
        </div>
    @endif
</div>

<div class="text-right">
    <button type="submit" class="btn btn-primary">
        Save {{ $object->name or 'Domain' }}
    </button>
</div>
