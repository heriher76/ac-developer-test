<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url(request()->route()->parameter('locale').'/home') }}">@lang('layout.front.home')</a>

                        <a class="dropdown-item" href="{{ route('logout', ['locale' => request()->route()->parameter('locale')]) }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            @lang('layout.front.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout', ['locale' => request()->route()->parameter('locale')]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login', ['locale' => request()->route()->parameter('locale')]) }}">@lang('layout.front.login')</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register', ['locale' => request()->route()->parameter('locale')]) }}">@lang('layout.front.register')</a>
                        @endif
                    @endauth
                    
                    <a href="{{ url('/id') }}" style="background-color: #c7c3b7; border-radius: 20%;">ID</a>
                    <a href="{{ url('/en') }}" style="background-color: #c7c3b7; border-radius: 20%;">EN</a>
                    <a href="{{ url('/es') }}" style="background-color: #c7c3b7; border-radius: 20%;">ES</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    @lang('layout.front.welcome')
                </div>
            </div>
        </div>
    </body>
</html>
