<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />



    @yield('styles')
    <style>
        #header
        {
            margin-top: -40px;
            margin-left: 60px;
        }
    </style>
</head>
<body>
    @guest
        <div id="app">
            <nav class="navbar navbar-primary navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->

                        <a  class="navbar-brand" href="{{ url('/') }}">
                              <img src="{{asset('/img/logo.png')}}" height="50" width="50" style="margin-top: -10px;" >
                           <p id="header"> {{ config('app.name', 'DOST Financ Management Information System') }} </p>
                        </a>

                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    @else
        <div class="wrapper">

            <div class="sidebar" data-color="#47d5ffeb" data-image="../img/sidebar-1.jpg">
                <!--
                    Tip 1: You can change the color of the sidebar using: data-color="#47d5ffeb | #47d5ffeb | green | orange | red"

                    Tip 2: you can also add an image using data-image tag
                -->

                <div class="logo">
                    <a href="{{ url('/') }}" class="simple-text">
                        {{ config('app.name', 'DOST Finance Management Information System') }}
                    </a>
                </div>

                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="{{ Request::is('components') || Request::is('home') ? 'active' : '' }}">
                            <a href="{{url('/home')}}">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard </p>
                            </a>
                        </li>
                        <li class="{{ Request::is('components/Registry') ? 'active' : '' }}">
                            <a href="{{ route('registryform') }}">
                                <i class="material-icons text-gray">view_comfy</i>
                                <p>Registry</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('components/table-list') ? 'active' : '' }}">
                            <a href="{{url('components/table-list')}}">
                                <i class="material-icons">content_paste</i>
                                <p>Table List</p>
                            </a>
                        </li>
<!--                         <li class="{{ Request::is('components/table-list') ? 'active' : '' }}">
                            <a href="{{url('components/table-list')}}">
                                <i class="material-icons">content_paste</i>
                                <p>Table List</p>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">{{ config('app.name', 'DOST FMIS') }}</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content" id="app">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
    @endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')


</body>
</html>
