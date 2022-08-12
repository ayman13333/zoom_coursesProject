@extends('layouts.app')
@section('content')
<div class="container">
    <h1>  الطلبات الواردة</h1>
    <div class="form-group">
        <label for="exampleInputPassword1" style="font-size: x-large">الكورس المختار</label>
        <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $course_name }}" readonly  style="background-color:gainsboro;">
    </div>
    <table class="table" style="margin-top: 10px;">
        <thead>
          <tr>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">تحكم</th>
            <th scope="col">ازالة</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
            <tr>
                <td>{{$order->user_name}} </td>
                <td>{{$order->phone}} </td>
                <td>{{$order->user_email}}  </td>
                {{-- <td> <a class="btn btn-danger"href="">ازالة الكورسات الخاصة بهذا المستخدم</a></td> --}}
                @if ($order->open==0)
                <td> <a class="btn btn-primary"href="{{route('openCourse',$order->id)}}">فتح الكورس لهذا المستخدم</a></td>
                @else
                <td> <a class="btn btn-dark"href="{{route('closeCourse',$order->id)}}">اغلاق الكورس لهذا المستخدم</a></td>
                @endif
                <td>
                    <form method="POST" action="{{ route('users.destroy', $order->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="حذف الطلب">
                    </form>
                </td>
                {{-- <td> <a class="btn btn-danger"href="{{route('users.destroy')}}">حذف الطالب</a></td> --}}

            </tr>
            @endforeach
        </tbody>
      </table>
      <a href="{{route('courses.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الكورسات الرئيسية</a>
</div>
@endsection
