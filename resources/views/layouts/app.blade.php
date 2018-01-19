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
    <style href="{{ asset('css/app.css') }}" rel="stylesheet"></style>
    {{--<style href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet"></style>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('style')
    <style>
        body{
            background-color: #3f51b5;
        }
    </style>

</head>
<body>
<div id="app">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="/profile" style="color: #0c0c0c">Profile</a></li><li class="divider"></li>
        <li><a href="/logout" style="color: #0c0c0c">Logout</a></li><li class="divider"></li>

    </ul>
    <nav class="white z-depth-5" style="margin-bottom: 10%">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo" style="margin-left: 2%; color: black">Home</a>
            <ul class="right hide-on-med-and-down">
                @auth()
                    <li>
                        <a class="dropdown-button" href="" data-activates="dropdown1" style="color: black">
                            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" id="avatar" style="height: 30px; margin-top: 5%" class="circle responsive-img z-depth-3">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                @else
                    <li><a href="/login" style="color: black">Login</a></li>
                    <li><a href="/register" style="color: black">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    $( document ).ready(function(){
        $(".dropdown-button").dropdown({
            hover: true,
            constrainWidth: false,
            belowOrigin: true
        });
    })
</script>
@yield('script')

</body>
</html>
