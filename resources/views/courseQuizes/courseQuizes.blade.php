@extends('layouts.app')
@section('content')
<div class="container">
    <div class="form-group">
        <label for="exampleInputPassword1" style="font-size: x-large">البرامج المختار</label>
        <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $course->name }}" readonly  style="background-color:gainsboro;">
    </div>
    <form method="post" enctype="multipart/form-data" action="{{route('coursequiz.store')}}">
        @csrf
         <input type="hidden" name="course_id" value="{{$course->id}}">
         <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">ادخل اسم الاختبار الذي تريد اضافته</label>
            <input type="text" class="form-control" name="name"   >
        </div>
        <button type="submit" class="btn btn-success" >اضافة اختبار</button>
    </form>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">اسم الاختبار</th>
                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($quizes as $quiz)
                    <td> <p style="font-size: large;"> {{ $quiz->name }} </p> </td>
                    <td>
                        <a class="btn btn-dark" href="{{route('CourseQuizShowQuestion',$quiz->id)}}">الاسئلة الخاصة بهذا الاختبار</a> <br>
                        <form method="POST" action="{{route('coursequiz.destroy',$quiz->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="margin-top: 10px" class="btn btn-danger" value="حذف الاختبار">
                        </form>
                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('courses.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الكورسات</a>
</div>
@endsection
