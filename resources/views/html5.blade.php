<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'default title')</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    @yield('meta')

    <!-- stylesheets -->
    {!! HTML::style('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css') !!}
    {!! HTML::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    @yield('styles')

    {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') !!}
    <script>
        var URL = {
            'base' : '{{ URL::to('/') }}',
            'current' : '{{ URL::current() }}',
            'full' : '{{ URL::full() }}'
        };
    </script>
</head>
<body>


@yield('navbar.prepend')
@include('app.navbar')
@yield('navbar.append')


@section('wrapper')
<div id="main">
    <div class="container">

        @yield('main.prepend')

        <div id="content">
            @yield('content')
        </div><!-- ./ #content -->

        @yield('main.append')

    </div>
</div><!-- ./ #main -->
@show

@yield('footer.prepend')
@include('app.footer')
@yield('footer.append')


<!-- scripts -->
{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js') !!}
{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js') !!}
@yield('scripts')

</body>
</html>
