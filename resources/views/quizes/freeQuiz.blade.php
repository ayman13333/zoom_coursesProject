@extends('layouts.app')
@section('content')
<div class="container">
    <h1>  صفحة الاسئلة المجانية</h1>
    <a class="btn btn-success" href="{{ route('addQuiz',[$course_id,$course_name]) }} ">اضافة اسئلة</a>
</div>
@endsection
