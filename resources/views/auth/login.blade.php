 {{-- @extends('layouts.app')

@section('content') --}}
<head>
    <link rel="icon" href="{{ url('logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body{
      background-color: black;
      /* text-align: center */
    }
    label{color: #555555 !important;
        font-size: large !important;
        font-weight: 800 !important;
    }
    </style>
</head>
<body dir="rtl">
<div class="container">
    {{-- <p class="text-center" style="margin-top: 40px;">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span style="font-size: x-large;font-weight: 600;color: blue;">   قدرات وتحصيلي </span>  <img src="{{ asset('logo.png') }}" style="height: 50px;width:50px;margin-top: -5px;margin-right: -11px;">
           </a>
    </p> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 86px;">
                <div class="card-header" style="background-color: blueviolet;color:white;text-align:center;font-size: x-large;font-weight: 800;">تسجيل الدخول</div>

                <div class="card-body" style="margin-right: 60px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label> <br>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>تأكد من ادخال البريد الالكتروني بشكل صحيح</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> الرجاء ادخال كلمة السر بشكل صحيح</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top:10px">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" >
                                       البقاء متصلا
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-primary" style="background: #3cbfbe!important;width:40%">
                                    تسجيل الدخول
                                </button>
                                <a class="btn btn-dark" href="{{ route('register') }}" style="width:42%">
                                    ليس لديك حساب؟
                                </a>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                        <p class="text-center" style="margin-top: 40px;">
                            <a class="" href="{{ url('/') }}">
                                                   العودة الي الصفحة الرئيسية
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
 {{-- @endsection --}}
