@extends('layouts.app')
@section('content')
@if (session('coursesaved'))
<div class="alert alert-success">
    {{ session('coursesaved') }}
</div>
@endif
@if (session('video_saved'))
<div class="alert alert-success">
    {{ session('video_saved') }}
</div>
@endif
<div class="container">
    <h1> اضافة فيديوهات الكورس </h1>
    <form method="POST" action="{{route('insertVideoData')}}">
        @csrf
        <input type="hidden" name="course_id" value="{{ $id }}">
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large;">الكورس الذي ستضاف له الفيديوهات
            </label>
            <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $name }}"
                readonly style="background-color:gainsboro;">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">رقم الفيديو او عنوان الفيديو
            </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">رابط الفيديو
            </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="link">
        </div>

        <button type="submit" class="btn btn-success">اضافة</button> <br>
        <a href="{{route('courses.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الكورسات الرئيسية</a>
    </form>

</div>
@endsection
