<br>
<ul class="nav nav-tabs" role="tablist">
    <li{!! $currentController == 'PageController' ? ' class="active"' : '' !!}>
    <a href="{{ action('PageController@getIndex') }}">Pages</a>
    </li>
    <li{!! $currentController == 'PageTemplateController' ? ' class="active"' : '' !!}>
    <a href="{{ action('PageTemplateController@getIndex') }}">Templates</a>
    </li>
    <li{!! $currentController == 'PageDomainController' ? ' class="active"' : '' !!}>
    <a href="{{ action('PageDomainController@getIndex') }}">Domains</a>
    </li>
</ul>
