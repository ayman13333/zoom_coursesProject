@extends('layouts.app')
@section('content')
    <div class="container">
        <h1> صفحة تعديل الفيديوهات الخاصة بالكورس </h1>
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">الكورس الذي ستضاف له الفيديوهات
            </label>
            <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $name }}"
                readonly style="background-color:gainsboro;">
        </div>
        <a class="btn btn-success" href="{{ route('addVideos',[$course_id,$name])}} ">اضافة فيديو</a>
        <table class="table" style="margin-top: 10px;">
            <thead>
              <tr>
                <th scope="col">الاسم</th>
                <th scope="col">الرابط</th>
                <th scope="col">تحكم</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $videos as $video )
              <tr>
                <td>{{$video->name}}</td>
                <td>
                 <?php echo $video->link  ?>
                </td>
                <td>
                    <a class="btn btn-warning"
                    href="{{ route('videos.edit', $video->id) }}">تعديل</a> <br>
                    <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="حذف" style="margin-top: 10px">
                    </form>
                </td>



              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{route('courses.index')}}" class="btn btn-primary">الرجوع لصفحة الكورسات الرئيسية</a>
    </div>
@endsection
