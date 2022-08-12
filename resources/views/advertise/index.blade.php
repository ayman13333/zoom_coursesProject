@extends('layouts.app')
@section('content')
<div class="container">
    <h1> صفحة الاعلانات</h1>
    <a class="btn btn-success" href="{{ route('advertise.create') }} ">اضافة اعلان</a>
    <table class="table" style="margin-top: 10px">
        <thead>
          <tr>
            <th scope="col">صورة الاعلان</th>
            <th scope="col">رابط الاعلان</th>
            <th scope="col">وصف الاعلان</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($adds as $add )
            <tr>
            <td> <img src="{{ asset('storage/articles/' . $add->image) }}" alt=""style="height: 216px;"> </td>
            <td> <a href="{{$add->link}}" target="_blank"> {{$add->link}}</a>  </td>
            <td> <?php echo $add->description ?> </td>
            <td>
                <form method="POST" action="{{ route('advertise.destroy', $add->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="حذف الاعلان">
                </form>
            </td>
            </tr>

            @endforeach

        </tbody>
      </table>
</div>


@endsection
