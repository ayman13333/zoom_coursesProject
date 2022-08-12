@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert alert-success" role="alert">
        <h1 class="text-center" style="color: green"> يمكنك الان مشاهدة البرامج التي قمت بحجزها</h1>
    </div>
    <div class="row" >
        @foreach ($booked_courses as $course)

            <div class="card" style="">
                <img class="card-img-top" src="{{ asset('storage/upload_courses/' . $course->image) }}" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title"> {{ $course->name }}</h2>

                  <p class="text-center"> <a href="{{ route('users.show', $course->id)}}" class="btn btn-success"
                    style="margin-top: 10px">ابدأ الان</a> </p>
                </div>
              </div>

        @endforeach
    </div>
</div>
@endsection
