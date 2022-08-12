@extends('layouts.app')
@section('content')
    <style>
        .one {
            /* width: 20%; */
            margin-right: 10px;
        }

        .two {
            width: 20%;
            margin-left: 10px;
        }
       .parent{
        padding-bottom: 40.25%;
       }
        .iframe-container {
            position: relative;
            width: 80%;
            padding-bottom: 40.25%;
            height: 315;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        .courses ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
            border: 1px solid #555;
        }

        .courses li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        .courses li {
            /* text-align: center; */
            border-bottom: 1px solid #555;
        }

        .courses li:last-child {
            border-bottom: none;
        }

        .courses li a.active {
            background-color: #04AA6D;
            color: white;
        }

        .courses li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        #img {
            /* opacity: 0.5; */
        }

        #img:hover {
            opacity: 1;
        }
    </style>
    <div class="container">

        <div class="parent" style="display: flex">
            <div class="two">

                <div class="alert alert-secondary" role="alert" style="height:100%">
                    <h3 style="color: blue"> الدروس </h3>
                    <h4 style="color: blue"> الدرس الحالي: {{ $page_video->name }}</h4>
                    @foreach ($videos as $video)
                        <div class="courses" style="margin-bottom: 10px">
                            <ul>
                                <li><a href="{{route('videoList',$video->id)}}">{{ $video->name }}</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    <hr>

                    <p class="text-center">
                        @foreach ($quizes as $quiz)
                        <a href="" class="btn btn-success" style="margin-top: 10px">
                            <strong>  {{$quiz->name}}  </strong>

                        </a> <br>

                        @endforeach

                    </p>

                </div>

            </div>

            {{-- <div class="one" style="height: 100%;"> --}}
                <div class="iframe-container" >
                    <?php echo $page_video->link; ?>
                </div>

            {{-- </div> --}}

        </div>


    </div>
    </div>
@endsection
