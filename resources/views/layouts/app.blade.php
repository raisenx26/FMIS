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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />



    @yield('styles')
    <style>
        #header {
            margin-top: -37px;
            margin-left: 110px;
        }

        #logoz {
            margin-left: 70px;
            margin-top: 10px;

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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('/img/real_logo.png')}}" height="50" width="100" style="margin-top: -10px;">
                        <p id="header"> {{ config('app.name', 'DOST Financial Management Information System') }} </p>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
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
            <div id="logoz">
                <img src="{{asset('/img/real_logo.png')}}" height="50" width="100">
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Request::is('components') || Request::is('home') ? 'active' : '' }}">
                        <a href="{{url('/home')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard </p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/LIB') ? 'active' : '' }}">
                        <a href="{{ route('libform') }}">
                            <i class="material-icons text-gray">folder_open</i>
                            <p>Create LIB</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/Project') ? 'active' : '' }}">
                        <a href="{{ route('projectform') }}">
                            <i class="material-icons text-gray">folder_open</i>
                            <p>Create Project</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/Registry') ? 'active' : '' }}">
                        <a href="{{ route('registryform') }}">
                            <i class="material-icons text-gray">view_comfy</i>
                            <p>ORS Registry</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/bursregistry') ? 'active' : '' }}">
                        <a href="{{ route('viewburs')}}">
                            <i class="material-icons">view_comfy</i>
                            <p>BURS Registry</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/table-list') ? 'active' : '' }}">
                        <a href="{{url('components/table-list')}}">
                            <i class="material-icons">content_paste</i>
                            <p>Filter ORS Registries</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/table-list_burs') ? 'active' : '' }}">
                        <a href="{{url('components/table-list_burs')}}">
                            <i class="material-icons">content_paste</i>
                            <p>Filter BURS Registries</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/cancelledregistries') ? 'active' : '' }}">
                        <a href="{{route('viewcancelled')}}">
                            <i class="material-icons">cancel</i>
                            <p>Cancelled Registries</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/monthly_summary') ? 'active' : '' }}">
                        <a href="{{route('monthly_summary')}}">
                            <i class="material-icons">list_alt</i>
                            <p>Monthly Summary</p>
                        </a>
                    </li>
                    </li>
                    <li class="{{ Request::is('components/addnew') ? 'active' : '' }}">
                        <a href="{{ route('addnew') }}">
                            <i class="material-icons">settings</i>
                            <p>Utilities</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('components/aboutus') ? 'active' : '' }}">
                        <a href="{{ route('aboutus') }}">
                            <i class="material-icons">person</i>
                            <p>About Us</p>
                        </a>
                    </li>

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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
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


        </div>
    </div>
    @endguest
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    @yield('scripts')
    
</body>

</html>
