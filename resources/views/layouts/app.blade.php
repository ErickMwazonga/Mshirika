<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRM') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" >

    {{--fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">

    {{--sweet alert--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">

</head>

<body>

<div class="container">
    <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title" >
            <strong>Cytonn Internship Programme</strong>
        </div>
    </div>

    <div class="top-bar"  id="responsive-menu">
        <div class="top-bar-left">
            <!-- Authentication Links -->
            @if (Auth::check())

                <ul class="dropdown menu" data-dropdown-menu>
                    <li><a href="/home">CRM</a></li>
                    <li>
                        <a href="#">Institution</a>
                        <ul class="menu vertical">
                            <li><a href="/institutions">Institutions</a></li>
                            <li><a href="/institutions/create">Add Institution</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Interaction</a>
                        <ul class="menu vertical">
                            <li><a href="/interactions">Interactions</a></li>
                            <li><a href="/interactions/create">Add Interaction</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Deals</a>
                        <ul class="menu vertical">
                            <li><a href="/deals">Deals</a></li>
                            <li><a href="/deals/create">Add a Deal</a></li>
                        </ul>
                    </li>

                    @else

                    @endif
                </ul>

        </div>

        <div class="top-bar-right">

            <ul class="dropdown menu" data-dropdown-menu>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="is-dropdown-submenu-parent">
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="menu is-dropdown-submenu" role="menu">
                            <li role="menuitem">
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
                @endif
            </ul>
        </div>
    </div>

    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script> $(document).foundation();</script>

<!-- Include this after the sweet alert js file -->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<!-- Include this after the sweet alert js file -->
@include('sweet::alert')


</body>
</html>
