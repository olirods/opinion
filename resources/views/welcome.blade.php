<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Opinion') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="full-height">
        <div class = "flex-center position-ref title">Opinion</div>
        <div>
                <a class="nav-link flex-center" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link flex-center" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
    </div>
</body>