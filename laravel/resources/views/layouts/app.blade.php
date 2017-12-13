<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{asset("dist/css/bootstrap.css")}}" rel="stylesheet">
    <link href="{{asset("dist/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("dist/css/font")}}" rel="stylesheet">
    <link href="{{asset("dist/css/summernote.css")}}" rel="stylesheet">
    <link href="{{asset("css/app.css")}}" rel="stylesheet">
    <link href="{{asset("css/homeapp.css")}}" rel="stylesheet">
    <link href="{{asset("dist/css/toastr.min.css")}}" rel="stylesheet">

    <script src="{{asset("dist/js/jquery.min.js")}}"></script>
    <script src="{{asset("dist/js/jspdf.min.js")}}"></script>
    <script src="{{asset("dist/js/jspdf.debug.js")}}"></script>
    <script src="{{asset("dist/js/html2canvas.min.js")}}"></script>

</head>
<body>
    <div id="app" class="container">
        <nav class="navbar navbar-default navbar-static-top ">
            <div class="container1">
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="margin-left: -5px;padding-left: -5px;left: -5px;">
                        <span>
                            <img src="{{('/laravel/public/picture/zijing.jpg')}}" style="height: 20px;width: 20px;">
                            {{ config('app.name', '') }}
                        </span>

                    </a>
                </div>

                <div class="collapse navbar-collapse app-navbar-collapse" id="app-navbar-collapse">
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
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>


<script src="{{asset("dist/js/bootstrap.js")}}"></script>
<script src="{{asset("dist/js/toastr.min.js")}}"></script>
<script src="{{asset("dist/js/summernote.min.js")}}"></script>
<script src="{{asset("dist/js/summernote-zh-CN.min.js")}}"></script>


<script src="{{asset("js/app.js")}}"></script>

</html>
