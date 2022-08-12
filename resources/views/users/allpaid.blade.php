@extends('layouts.app')
@section('content')
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
</style>

<div class="container">
    <div class="alert alert-success" role="alert">
        <h2 class="text-center">  يمكنك الان الاستمتاع ببرامجنا المدفوعة </h2>
        </div>
    <div class="row">
        @if (session('order_booked'))
        <div class="alert alert-success">
            {{ session('order_booked') }}
        </div>
        @endif
        @foreach ($paidCourses as $course)
        <div class="card" style="">
            <img class="card-img-top" src="{{ asset('storage/upload_courses/' . $course->image) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$course->name}} </h5>
              <h5 class="card-title"> السعر:{{$course->price}} </h5>
              <form method="POST" action="{{route('bookOrder')}}">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="course_name" value="{{$course->name}}">
                <button type="submit" class="btn btn-danger">احجز الان</button>
              </form>

              {{-- <a href="#" class="btn btn-danger">احجز الان</a> --}}
            </div>
          </div>

        @endforeach

    </div>
</div>
@endsection
