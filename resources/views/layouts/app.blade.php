<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="_token" content="{{ csrf_token() }}"/>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/my.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    
</head>
<body >
      
    <div id="app" style="height:100%">
        <nav class="navbar navbar-default navbar-fixed-top black-text" >
            <div class="container">
                <div class="navbar-header ">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed btn-small" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" aria-controls="app-navbar-collapse">
                        <!-- <span class="sr-only">Toggle Navigation</span> -->
                        <span class="glyphicon glyphicon-user"><i class="caret"></i></span>
                        </button>
                    @if(Route::currentRouteName() != null)
                    <button type="button" class=" navbar-toggle collapsed" data-toggle="collapse" data-target="#side-menu" aria-expanded="false" aria-controls="app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @endif
                    <!-- Branding Image -->
                    <a class=" navbar-brand black-text" href="{{ url('/') }}"  id="brand-name">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" id="nav-login">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}" class="black-text">Login</a></li>
                            <li><a href="{{ route('register') }}" class="black-text">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle black-text"  data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu btn btn-small" id="logoutUl" style="width: 20px;">
                                    <li id="ulogoutl"  >
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="black-text text-center">
                                            Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="container jumbotron bg" id="mainContent">
                <div class="row container profile col-lg-3 col-md-3  col-sm-5 profile-sidebar sidebar-wrapper ">
                    @yield('sidebar')
                </div>
                <div class="row col-lg-9 col-md-9  col-sm-8 col-xs-12" id="mainContent1">
                    @yield('content')
                </div>
                @yield('contentWelcome')
            </div>
            <!-- Footer -->
            <footer class="navbar navbar-default bg-4 text-center navbar-fixed-bottom  black-text" >
                <p style="margin:10px">ProjectTracker © 2018</p> 
            </footer>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset("js/my.js")}}" type="text/javascript"></script>
</body>
</html>
