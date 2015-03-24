<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('vendor/gbrock/pages/css/app.css') }}" rel="stylesheet">
    @if(isset($css) && count((array) $css))
        @foreach((array) $css as $c)
            <link href="{{ $c }}" rel="stylesheet">
        @endforeach
    @endif
</head>
<body>
<script>document.getElementsByTagName('body')[0].className+=' js'</script>

@section('wrapper')
    @yield('content')
@show

@if(isset($js) && count((array) $js))
    @foreach((array) $js as $j)
        <script src="{{ $j }}"></script>
    @endforeach
@endif
</body>
</html>
