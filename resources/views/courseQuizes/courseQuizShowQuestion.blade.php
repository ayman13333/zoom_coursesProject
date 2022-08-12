@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('CourseQuizAddQuestion')}}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
        <div class="form-group">
            <label for="exampleInputPassword1" style="font-size: x-large">ادخل السؤال الذي تريد اضافته</label>
            <input type="text" class="form-control" name="question_name" style="margin-top: 10px" placeholder="بعد ادخال السؤال سوف تقوم ب ادخال الاختيارات" required>
        </div>
        <button type="submit" class="btn btn-success" >اضافة السؤال</button>
    </form>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">السؤال</th>
                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($questions as $question)
                    <td> <p style="font-size: large;"> {{ $question->question_name }} </p> </td>

                    <td>
                        {{-- {{route('quizes.show',$question->id)}} --}}
                        <a class="btn btn-dark" href="{{route('CourseQuizShowChoices',$question->id)}}">الاختيارات الخاصة بهذا السؤال</a> <br>
                        <form method="POST" action="{{route('quizes.destroy',$question->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="margin-top: 10px" class="btn btn-danger" value="حذف">
                        </form>

                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('courses.index')}}" class="btn btn-primary" style="margin-top: 10px">الرجوع لصفحة الكورسات</a>
</div>
@endsection
