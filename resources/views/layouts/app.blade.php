<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@yield('styles')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    @include('partials._nav')

    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    Inspired by <a href="https://medium.com">Medium</a>, made by Jamie.
                </p>
            </div>
        </div>
    </footer>
</div>
{{--<script src="{{ mix('js/app.js') }}"></script>--}}
@yield('scripts')
</body>
</html>