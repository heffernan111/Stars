@extends('layouts.home')


@section('content')
    <div class="content">
        <div id="container">
            <canvas id="canvas"></canvas>
                <div id="overlay">
                    <div class="title m-b-md">
                        Astro Gaze
                    </div>
                    <div class="links">
                        <a href="\guides">Guides</a>
                        <a href="\shop">Shop</a>
                        <a href="\gallery">Gallery</a>
                        <a href="\maps">Maps</a>
                        <a href="\chat">Chat</a>
                    </div>
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
                </div>
        </div>
    </div>
@endsection
