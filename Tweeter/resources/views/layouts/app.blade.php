<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="nav-extended green lighten-5">
            <div class="nav-wrapper">
                <a class="green-text text-darken-4" href="#" class="brand-logo"><img src="images/twitter-4-48.png"><strong>Tweeter</strong></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class=" right hide-on-med-and-down">
                  <li><a href="{{ url('/home') }}"><h5 class="green-text text-darken-4"><strong>Home</strong></h5></a></li>
                  <li><a href="{{ url('/readTweets') }}"><strong><h5 class="green-text text-darken-4">Tweets</strong></h5></a></li>
                @guest
                    <li><a href="{{ route('login') }}"><strong><h5 class="green-text text-darken-4">{{ __('Login') }}</strong></h5></a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}"><strong><h5 class="green-text text-darken-4">{{ __('Register') }}</strong></h5></a></li>
                @endif
                @else
                    <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><h5 class="green-text text-darken-4"><strong>
                                    {{ __('Logout') }}</strong></h5>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>
            <ul class="sidenav green lighten-5" id="mobile-demo">
                <div class="row">
                <li>
                    <div class="col s6">
                        <img src="images/twitter-4-48.png">
                    <a href="{{ url('/home') }}"><h5 class="green-text text-darken-4"><strong>Home</strong></h5></a>
                    </div>
                    <div class="col s6 right-align">
                    <a class="green-text text-darken-4" href="{{ url('/home') }}"><i class="material-icons right">close</i></a>
                    </div>
                </li>
                <li><div class="col s12 left-align">
                    <a href="{{ url('/readTweets') }}"><h5 class="green-text text-darken-4"><strong>Tweets</strong></h5></a>
                    </div></li>
                @guest
                 <li><div class="col s12 left-align"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a>
                </div></li>
                @endif
                @else
                <li><div class="col s12 left-align"><a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><h5 class="green-text text-darken-4"><strong>
                              {{ __('Logout') }}</strong></h5>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                </li>
            </div>
            @endguest
          </ul>
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                    </ul>
                </div> --}}
            {{-- </div> --}}


        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
