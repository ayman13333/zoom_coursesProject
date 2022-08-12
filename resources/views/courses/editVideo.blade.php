@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('name_updated'))
            <div class="alert alert-warning">
                {{ session('name_updated') }}
            </div>
        @endif
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">الاسم القديم</label>
            <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $name }}" readonly style="background-color:gainsboro;">
        </div>
        <form method="POST" action="{{ route('videos.update', $video_id) }}" enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputPassword1" style="font-size: x-large">ادخل الاسم الجديد</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" style="font-size: x-large">الرابط الجديد</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="اذا كنت تريد تغيير الرابط من فضلك ادخل الرابط الجديد" name="link" >
            </div>
            <button type="submit" class="btn btn-warning">تعديل</button>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">الرجوع لصفحة الكورسات الرئيسية</a>

        </form>
    </div>
@endsection
