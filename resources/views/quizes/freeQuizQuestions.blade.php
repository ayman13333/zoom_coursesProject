@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('freeQuizAddQuestion')}}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">ادخل السؤال الذي تريد اضافته</label>
            <input type="text" class="form-control" name="question_name" style="margin-top: 10px" placeholder="بعد ادخال السؤال سوف تقوم ب ادخال الاختيارات" required>
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">ارفع الصورة الخاصة بالسؤال اذا بتحب</label>
            <input type="file" class="form-control" name="image" style="margin-top: 10px"  >
        </div> --}}
        <button type="submit" class="btn btn-success" >اضافة السؤال</button>
    </form>
    <hr>
    <h1>  الاسئلة اليومية</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">السؤال</th>
                {{-- <th scope="col">الصورة</th> --}}
                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($questions as $question)
                    <td> <p style="font-size: large;"> {{ $question->question_name }} </p> </td>
                    {{-- <td>
                        @if ($question->image=='no image')
                        <p style="font-size: large;"> {{ $question->image }} </p>
                        @else
                        <img src="{{ asset('storage/quizes/' . $question->image) }}" alt=""
                        style="height: 200px;">
                        @endif
                    </td> --}}
                    <td>
                        <a class="btn btn-dark" href="{{route('quizes.show',$question->id)}}">الاختيارات الخاصة بهذا السؤال</a> <br>
                        <form method="POST" action="{{ route('quizes.destroy', $question->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="margin-top: 10px" class="btn btn-danger" value="حذف">
                        </form>
                        {{-- <a class="btn btn-danger" style="margin-top: 10px" href="{{route('quizes.destroy',$question->id)}}">حذف السؤال</a> <br> --}}
                    </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
