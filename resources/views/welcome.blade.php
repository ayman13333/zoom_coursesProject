@extends('layouts.app')
@section('content')
<style>
    .welcome{
        background-image: url("{{ asset('backgroundlogo.jpg') }}") ;
        width: 100%;
        height: 220px;
        margin-top: -10px;
        /* background-repeat: no-repeat; */
    }
    .headers{
        width: 100%;
        height: 50px;
        background-color: aliceblue;
        margin-top: -23px;
        padding-top: 10px;
    }
</style>
<div class="headers">
    <div style="margin-right: 46%;padding-top: 8px}">
    <a href="https://t.me/WMqudrat" target="_blank" title="قدرات-wm"> <i class="fa-brands fa-telegram fa-2x" ></i></a>
    <a href="http://tiktok.com/@WMqudrat" style="margin-right: 10px;" target="_blank" title="wmqudrat"> <i class="fa-brands fa-tiktok fa-2x"></i></a>
    <a href="https://youtube.com/channel/UC-qEsfKpKJdD-4JalcPTI9w" style="margin-right: 10px;" target="_blank" title="شروحات explanations | WM"> <i class="fa-brands fa-youtube fa-2x"></i></a>
    </div>

</div>
<div class="welcome" >
    <div class="container">
    <h1 style=" font-size: 41px;margin-right: 12%;color: #444;padding-top: 22px;"> مرحبا بك في <span style="font-size: 41px;font-weight: 600;color: blue;"> قدرات وتحصيلي</span></h1>
    <h5 style="margin-right: 12%;margin-top:25px;font-weight: 600;font-size: 20px;">  الاكاديمية الاولي المتخصصة في جميع اختبارات القياس</h5>
    <a href="{{ route('register') }}" class="btn btn-primary" style="background-color:#3CBFBE;margin-right: 12%;margin-top: 15px;">
        <p style="font-size: x-large;margin-bottom: 0;"> <i class="fa-solid fa-graduation-cap"></i> ابدأ الان </p>
    </a>

    <a href="{{route('dailyQuiz')}}" class="btn btn-primary" style="background-color:blueviolet;margin-right: 2%;margin-top: 15px;">
        <p style="font-size: x-large;margin-bottom: 0;"> <i class="fa-solid fa-circle-question"></i> السؤال اليومي </p>
    </a>

    </div>
    </div>
<div class="container">

        <h1 class="text-center" style="color: #444;margin-top: 63px;margin-bottom: 36px;">  اخر الاخبار</h1>
        <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="margin-left: 222px;">
              <div class="carousel-item active" style="text-align: -webkit-center">
                {{-- <img src="{{ asset('storage/articles/' . $first_add->image) }}" class="d-block w-100" alt="..."> --}}
                <div class="card" style="width: 32rem;">
                    <img src="{{ asset('storage/articles/' . $first_add->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      {{-- <h5 class="card-title">Card title</h5> --}}
                      <p class="card-text" style="font-size: 22px;color:#444;font-weight: 600">{{$first_add->description}}</p>
                      <a href="{{$first_add->link}}" target="_blank" class="btn btn-primary" style="background-color:#3CBFBE">تصفح الان</a>
                    </div>
                  </div>
              </div>
              @foreach ($adds as $add )
              <div class="carousel-item" style="text-align: -webkit-center">

                <div class="card"  style="width: 32rem">
                    <img src="{{ asset('storage/articles/' . $add->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">

                      <p class="card-text" style="font-size: 22px;color:#444;font-weight: 600">{{$add->description}}</p>
                      <a href="{{$add->link}}" target="_blank" class="btn btn-primary" style="background-color:#3CBFBE;">تصفح الان</a>
                    </div>
                  </div>
              </div>

              @endforeach

              {{-- <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
            </div> --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="color: crimson">
              <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: aqua;"></span>

              <span class="visually-hidden" >Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: aqua;"></span>

              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>


</div>
@endsection
