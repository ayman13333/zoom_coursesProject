@extends('layouts.app')
@section('content')
<div class="container">
 <h1> صفحة الكورسات</h1>
 <a class="btn btn-success" href="{{ route('courses.create') }} ">اضافة كورس</a>
 <table class="table">
    <thead>
        <tr>
            <th scope="col">الاسم</th>
            <th scope="col">الصورة</th>
            <th scope="col">السعر</th>
            <th scope="col">التقييم</th>
            <th scope="col">النوع</th>
            <th scope="col">تحكم</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($courses as $course)
                <td> {{ $course->name }} </td>
                <td> <img src="{{ asset('storage/upload_courses/' . $course->image) }}" alt=""
                        style="height: 216px;"> </td>
                <td> {{ $course->price }} </td>
                <td> {{ $course->rate }} </td>
                <td> {{ $course->type }} </td>
                <td style="">
                    <a class="btn btn-dark" href="{{route('courses.show',$course->id)}}">  الطلبات الواردة</a> <br>
                    <a class="btn btn-primary" href="{{route('coursequiz.show',$course->id)}}" style="margin-top: 10px;">  الاختبارات الخاصة بهذا البرامج</a> <br>
                    <a class="btn btn-warning" style="margin-top: 10px;"
                    href="{{ route('courses.edit', $course->id) }}">تعديل</a> <br>
                    <a class="btn btn-warning" style="margin-top: 10px;margin-bottom: 10px"
                    href="{{ route('videos.show', [$course->id]) }}">تعديل الفيديوهات الخاصة
                    البرامج</a> <br>

                    @if (session('delete_confirm'))
                    @if ($course->id == session('delete_confirm'))
                        <div class="alert alert-danger" role="alert">
                            هل انت متأكد من حذف هذا الكورس
                            <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="تأكيد الحذف">
                            </form>
                        </div>
                    @else
                        <a href="{{ route('confirmDeleteCourse', $course->id) }}" class="btn btn-danger">حذف </a>
                    @endif
                @else
                    <a href="{{ route('confirmDeleteCourse', $course->id) }}" class="btn btn-danger">حذف </a>
                @endif
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
