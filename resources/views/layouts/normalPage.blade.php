<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/request.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>


    </style>


    <meta charset="utf-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FIMS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @if (Auth::user()->position == 'Admin')
            <nav class="navbar navbar-expand-sm navbar-dark shadow-sm" style="background-color:rgb(24, 24, 24);">

            @else
                <nav class="navbar navbar-expand-sm navbar-dark shadow-sm" style="background-color:rgb(12, 100, 173);">
        @endif
        <div class="container">
            @if (Auth::user()->position == 'Admin')
                <a class="navbar-brand" href="{{ url('/admin_home') }}">
                    <i class="fas fa-box-open"></i>&nbsp FIMS

                </a>
            @elseif (Auth::user()->position == 'Staff')
                <a class="navbar-brand" style="font-size:1.5em;" href="{{ url('/staff_home') }}">
                    <i class="fas fa-box-open"></i>&nbsp FIMS

                </a>
            @else
                <a class="navbar-brand" style="font-size:1.5em;" href="{{ url('/staff_home') }}">
                    <i class="fas fa-box-open"></i>&nbsp FIMS

                </a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">


                    @if (Auth::user()->position == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/stock">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/item_approvals/userList">Approve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mngNewStck">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auditreport">Report</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/request/list">Request</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <div class="pt-1">
                                <a class="nav-link" href="#">
                                    {{ Auth::user()->name }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" action="/logout" method="GET">
                                @csrf
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-sign-out-alt fa-lg"></i></button>
                                </div>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        </nav>
        <main>
            <div style="display: flex; min-height: 120vh;flex-direction: column;padding-top:20px;">
                @yield('content')
            </div>
        </main>
    </div>

</body>

@if (Auth::user()->position == 'Staff')

    <footer id=" footer" class="footer text-light font-small sticky-bottom" style="background-color:rgb(12, 100, 173);">
    @else
        <footer id="footer" class="footer text-light font-small sticky-bottom"
            style="background-color:rgb(24, 24, 24);">
@endif

<div class=" container">
    <div class="row center">
        <div class="col-md-12 text-center">
            <p>Copyright Nova 2021. All rights reserved.</p>



        </div>
    </div>

</div>



</footer>

</html>
