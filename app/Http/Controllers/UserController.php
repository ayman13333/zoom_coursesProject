<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $courses_id = Order::where('user_id',Auth::user()->id)->where('open',1)->pluck('course_id');
        if ($courses_id->isEmpty()) {
            return view('users.noCourses');
        }
        else
        {
            $booked_courses = Course::whereIn('id', $courses_id)->get();
            return view('users.bookedCourses',compact('booked_courses'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $quizes=Course::find($id)->quizes;
        session()->put('videos', $id);
        $course_name = $course->name;
        $course_id=$course->id;
        $videos = Course::find($course_id)->videos;
        $page_video=$videos->first();
        return view('users.userVideos', compact('videos','course','page_video','quizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->back();
    }
    public function freeCourses(){
       $freeCourses=Course::where('type','free')->get();
       return view('users.allfree',compact('freeCourses'));
    }
    public function paidCourses(){
        $paidCourses=Course::where('type','paid')->get();
        return view('users.allpaid',compact('paidCourses'));
    }
    public function bookOrder(Request $request){
        Order::create([
            'course_name' => $request->course_name,
            'course_id' => $request->course_id,
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'phone' => Auth::user()->phone,
            'user_email'=> Auth::user()->email,
            'open' => 0,
        ]);
        return redirect()->back()->with('order_booked', 'تم الحجز بنجاح وسوف نتواصل معك في اقرب وقت');
    }
    public function videoList($id){
        $session_id=session()->get('videos');
        $course = Course::find($session_id);
        $videos = Course::find($session_id)->videos;
        $page_video=Video::find($id);
        return view('users.userVideos', compact('videos','course','page_video'));
    }
}
