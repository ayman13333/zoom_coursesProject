@extends('layouts.app')
@section('content')
<div class="container">
   <div class="form-group">
    <label for="exampleInputPassword1" style="font-size: x-large">السؤال</label>
    <input type="email" class="form-control" id="exampleInputPassword1" value="{{ $question_name }}"
        readonly  style="background-color:gainsboro;">
   </div>
   <hr>
   <h1>   الاختيارات الموجودة لهذا السؤال</h1>
   <table class="table">
    <thead>
        <tr>
            <th scope="col">الاختيار</th>
            {{-- <th scope="col">الصورة</th> --}}
            <th scope="col">الاجابة الصحيحة</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($choices as $choice)
                <td><p style="font-size: large;"> {{ $choice->choice_name }} </p> </td>
                <td>
                   @if ($choice->answer==1)
                   <i class="fa-solid fa-check fa-2x"></i>
                   @endif
                </td>

        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{route('courses.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الكورسات</a>

</div>
@endsection
