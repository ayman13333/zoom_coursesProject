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
<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 86px;">
                <div class="card-header" style="background-color: blueviolet;color:white;text-align:center;font-size: x-large;font-weight: 800;">مستخدم جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> الاسم ثنائي</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="email" class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="email" class="col-md-4 col-form-label text-md-end">رقم الهاتف</label>

                            <div class="">
                                <input  type="number" class="form-control" name="phone"  required >
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تأكيد كلمة المرور</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;background: #3cbfbe!important;">
                                    انشاء حساب
                                </button>
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
{{-- @endsection --}}
