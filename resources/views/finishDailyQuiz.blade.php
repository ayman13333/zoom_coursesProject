@extends('layouts.app')
@section('content')
<style>
    body{
        background-color: #D9D9D9;
    }
    .daily{
     width: 100%;
     height: 162px;
     background-color:  #5700B5;
     font-size: 30px;
     color: white;
     margin-top: -33px;
    }
    .question{
        width: 56%;
        background-color: white;
        height: 400px;
        margin-right: 19%;
        margin-top: -54px;
    }
    .question li:hover{
        background-color: aqua;
    }
</style>
<div class="daily" >
    <h1 class="text-center" style="padding-top: 50px;">  السؤال اليومي</h1>

</div>
<div class="container">
    <div class="question">
     <div  style="color: black;font-size: 20px;padding-top: 15px;margin-right: 65px;font-family: system-ui;">

        <ul style=" list-style-type: none;width:90%;border: 2px solid  #D9D9D9;">
            <p class="text-center" style=" color:#444;font-size: x-large;font-weight: 600;">   <span style="color: green;font-size: x-large;font-weight: 600;"> شكرا لك ,</span> لقد جاوبت علي اسئلة اليوم</p>
            <hr>
                <p class="text-center" style="color:#5700B5;font-size: x-large;font-weight: 600;">
                انت غير مسجل بالاكاديمية سجل الان حتي تستطيع اجراء جميع الاختبارات
                </p>
        </ul>

     </div>
    </div>

</div>
@endsection

