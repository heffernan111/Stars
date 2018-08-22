<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/starfield.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    <div id="app">
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="/profile/{{ \Auth::user()->id }}" role="button">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    @if($roles['roles'][0]['id'] == 1)
                        <a href="{!! url('/admin'); !!}">Admin</a>
                    @endif
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
