@extends('layouts.app')
@section('content')
@if (session('add_saved'))
<div class="alert alert-success">
    {{ session('add_saved') }}
</div>
@endif
<div class="container">
    <form method="POST" action="{{route('advertise.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">صورة الاعلان</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="image" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">رابط الاعلان</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="link">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">الوصف</label>
            <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="description" style="height: 100px;">
            </textarea>
        </div>
        <button type="submit" class="btn btn-success">اضافة الاعلان</button> <br>
        <a href="{{route('advertise.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الاعلانات</a>

     </form>
</div>
@endsection
