@extends('layouts.app')
@section('content')
<style>
    body{
        background-color: #D9D9D9;
    }
    .daily{
     width: 100%;
     height: 162px;
     background-color:  #5700B5;
     font-size: 30px;
     color: white;
     margin-top: -33px;
    }
    .question{
        width: 56%;
        background-color: white;
        height: 800px;
        margin-right: 19%;
        margin-top: -54px;
    }
  .question  li:hover{
        background-color: aqua;
    }
</style>
<div class="daily" >
    <h1 class="text-center" style="padding-top: 50px;">  السؤال اليومي</h1>

</div>
<div class="container">

    <div class="question">
     <div  style="color: black;font-size: 20px;padding-top: 15px;margin-right: 65px;font-family: system-ui;">

        <ul style=" list-style-type: none;width:90%">
            <h3> {{$question_name}}  </h3>
            @foreach ($choices as $choice )

            <a href="{{route('dailyQuizQuestionAnswer',$choice->id)}}" style="text-decoration: none;">  <li style="border: 1px solid  #D9D9D9;width:90%;margin-bottom: 10px;">  {{$choice->choice_name}}  </li> </a>
            @endforeach
            <hr style="width: 90%">
            @if (session('true'))
            <div class="alert alert-success" role="alert" style="width: 90%;">

                {{ session('true') }}
            </div>
            @endif
            @if (session('false'))
            <div class="alert alert-danger" role="alert" style="width: 90%;">

                {{ session('false') }}
            </div>

            @endif
            <p class="text-center">
                <a href="{{route('dailyQuizNextQuestion',$question_id)}}" class="btn btn-success">  السؤال التالي   </a>
                </p>
        </ul>

     </div>
    </div>

</div>
@endsection
