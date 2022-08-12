@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert alert-success" role="alert">
        <p class="text-center" > تم اضافة السؤال لهذا البرنامج بنجاح قم ب ادخال الاختيارات الان </p>
    </div>
    {{-- Session::has('success') --}}
    @if ($flag==1)
    <div class="alert alert-success">
        <p> تم اضافة الاختيار بنجاح</p>

    </div>
    @endif
    <div class="form-group">
        <label for="exampleInputPassword1" style="font-size: x-large">السؤال الذي تضيف له اختيارات</label>
        <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $question_name }}"
            readonly  style="background-color:gainsboro;">
    </div>

    <form method="POST" action="{{route('freeQuizAddChoice')}}">
        @csrf
        <input type="hidden" name="question_id" value="{{$question_id}}">
        <input type="hidden" name="question_name" value="{{$question_name}}">
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">ادخل الاختيار الذي تريد اضافته</label>
            <input type="text" class="form-control" name="choice_name" style="margin-top: 10px" placeholder="قم ب ادخال كل اخيار مع كل ضغطة زر" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">الاجابة الصحيحة</label>
            <input type="text" class="form-control" name="answer" style="margin-top: 10px" placeholder="اذا كان هذا الاختيار هو الاجابة الصحيحة اكتب نعم" >
        </div>
        <button type="submit" class="btn btn-success" >اضافة الاختيار</button>
    </form>
    <a href="{{route('freeQuiz')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الاسئلة المجانية</a>
</div>


@endsection
