<!doctype html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('قدرات وتحصيلي WM', 'قدرات وتحصيلي WM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- fav icon --}}
    <link rel="icon" href="{{ url('logo.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
     .card{
        margin: 10px;
        width: 19rem;
        text-align: -webkit-center;
    }
    @media only screen and (max-width: 800px) {
        .card{
        margin: 10px;
        width: 29rem;
        text-align: -webkit-center;
        margin-right: 10px !important;
    }
    }
    .card-title{
        font-size: 22px;
        color:#444;
        /* font-weight: 600; */
    }
    .paid{
        padding-right: 110px !important;
    }
     @media only screen and (max-width: 600px) {
        .paid{
        padding-right: 0px !important;
    }
    }
    .navbar{
        color:#444 !important;
    }
    body{
        color:#444;
        /* background-color: #D9D9D9; */
    }
    .nav-link{
        color: black  !important;
    }
    a.nav-link:hover {
        color: blueviolet !important;
        /* font-size: x-large; */
    }
     /* #id:hover {
        color: blueviolet !important;
        font-size: x-large !important;
    } */
    a.login:hover, a.login:active {font-size:  x-large;}
    .form-group {
        margin-bottom: 10px !important;
    }

    label {
        font-size: x-large;
    }

    h1 {
        margin-top: 10px;
    }

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container" >
                <a class="navbar-brand" href="{{ url('/') }}">
                 <span style="font-size: x-large;font-weight: 600;color: blue;">   قدرات وتحصيلي </span>  <img src="{{ asset('logo.png') }}" style="height: 50px;width:50px;margin-top: -5px;margin-right: -11px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" style="margin-left: 30%;margin-right:0px">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('freeCourses')}}" style="font-weight: 400;font-size: x-large;">
                             برامجنا المجانية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link paid" href="{{route('paidCourses')}}" style="font-weight: 400;font-size: x-large;">
                                  برامجنا المدفوعة
                            </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item login">

                                    <a class="nav-link"   href="{{ route('login') }}">
                                        <strong><i class="fa-solid fa-right-to-bracket"></i> تسجيل الدخول  </strong>
                                    </a>
                                </li>
                            @endif


                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <p id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </p>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->rule_id == 1)
                                    <a class="dropdown-item" href="{{route('advertise.index')}}">
                                        <strong> صفحة الاعلانات</strong>
                                    </a>
                                    <a class="dropdown-item" href="{{route('courses.index')}}">
                                        <strong> صفحة الكورسات </strong>
                                    </a>
                                    <a class="dropdown-item" href="{{route('freeQuiz')}}">
                                        <strong> صفحة الاسئلة المجانية</strong>
                                    </a>

                                    @else
                                    <a class="dropdown-item" href="{{route('users.index')}}">
                                        <strong> البرامج المحجوزة </strong>
                                    </a>

                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <strong>  تسجيل الخروج</strong>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
