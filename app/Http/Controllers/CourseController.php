<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::where('name','!=','freequiz')->get();
       // $courses=$courses->except('freequiz');
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_pic = $request->image;
        $course_pic_name = time() . '.' . $course_pic->extension();
        Storage::putFileAs('public/upload_courses', $course_pic,  $course_pic_name);
        $request->price == null ? $price = 0 : $price = $request->price;
        $course = new Course;
        $course->name = $request->name;
        $course->image = $course_pic_name;
        $course->price = $price;
        $course->type = $request->type;
        // $textToOutput = nl2br(htmlentities($request->description, ENT_QUOTES, 'UTF-8'));
        // $course->description=$textToOutput;
        $course->save();
        $id = $course->id;
        $name = $course->name;
        return redirect()->route('addVideos', [$id, $name])->with('coursesaved', ' تم حفظ الكورس بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $course_name=Course::find($id)->name;
       $orders=Course::with('orders')->find($id)->orders;
       return view('courses.receivedOrders',compact('orders','course_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::find($id);
        return view('courses.edit',compact('course'));
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
        if ($request->image == null) {
            $update = array();
            $request->name == null ? '' : $update['name'] = $request->name;
            $request->price == null ? '' : $update['price'] = $request->price;
            $request->type == null ? '' : $update['type'] = $request->type;
            Course::where('id', $id)->update(
                $update
            );
        }
        else{
             $course = Course::find($id);
             $img_destination = 'storage/upload_courses/' . $course->image;
             if (File::exists($img_destination)) {
                 File::delete($img_destination);
             }
             //upload new image
             $course_pic = $request->image;
             $course_pic_name = time() . '.' . $course_pic->extension();
             Storage::putFileAs('public/upload_courses', $course_pic,  $course_pic_name);
             $update = array();
             $request->name == null ? '' : $update['name'] = $request->name;
             $request->price == null ? '' : $update['price'] = $request->price;
             $request->type == null ? '' : $update['type'] = $request->type;
             $update['image'] = $course_pic_name;
             Course::where('id', $id)->update(
                 $update
             );
        }

        return redirect()->back()->with('course_updated', 'تم تعديل الكورس بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::find($id);
        $course->videos()->delete();
        $course->orders()->delete();

        $img_destination = 'storage/upload_courses/' . $course->image;
        if (File::exists($img_destination)) {
            File::delete($img_destination);
        }
        $course->delete();
        return redirect()->back();
    }
    public function addVideos($id, $name)
    {
        return view('courses.addCourseVideos', compact('id', 'name'));
    }
    public function insertVideoData(Request $request)
    {
        Video::create([
            'name' => $request->name,
            'link'=>$request->link,
            'course_id'=>$request->course_id
        ]);
        return redirect()->back()->with('video_saved', 'تم حفظ الفيديو لهذا الكورس');
    }

    public function confirmDeleteCourse($id)
    {
        return redirect()->back()->with('delete_confirm', $id);
    }
    public function openCourse($id)
    {
        Order::where(['id'=>$id])->update(array(
            'open' => 1,
        ));
        return redirect()->back();
    }
    public function closeCourse($id)
    {
        Order::where(['id'=>$id])->update(array(
            'open' => 0,
        ));
        return redirect()->back();
    }

}
