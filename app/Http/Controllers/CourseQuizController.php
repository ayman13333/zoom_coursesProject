<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;



class CourseQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $quiz=Quiz::create([
         'name'=>$request->name,
         'course_id'=>$request->course_id
         ]);
         return view('courseQuizes.addCourseQuiz',compact('quiz'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $course=Course::find($id);
       $quizes=Course::find($id)->quizes;
       return view('courseQuizes.courseQuizes',compact('course','quizes'));
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
    public function destroy($quiz_id)
    {
       $quiz=Quiz::find($quiz_id)->questions;
       $question_id=$quiz[0]->id;
       Question::find($question_id)->choices()->delete();
       Question::find($question_id)->delete();
       Quiz::find($quiz_id)->delete();
       return redirect()->back();
    }
    public function CourseQuizAddQuestion(Request $request){
       $question=Question::create([
        'question_name'=>$request->question_name,
        'quiz_id'=>$request->quiz_id
       ]);
       $question_id=$question->id;
       $question_name=$question->question_name;
       $flag=0;
       return view('courseQuizes.addQuestionChoice',compact('question_id','question_name','flag'));
    }

    public function CourseQuizAddChoice(Request $request){
       // return $request;
        $question_id= $request->question_id;
        $question_name= $request->question_name;
        $request->answer==null ? $answer=0 :$answer=1;
        $flag=1;
        $choice=new Choice;
        $choice->answer=$answer;
        $choice->question_id=$request->question_id;
        $choice->choice_name=$request->choice_name;
        $choice->save();
        return view('courseQuizes.addQuestionChoice',compact('question_id','question_name','flag'))->with('choice_added', 'تم اضافة الاختيار بنجاح');
    }
    public function CourseQuizShowQuestion($quiz_id)
    {
       $questions=Quiz::find($quiz_id)->questions;
       $quiz_id=Quiz::find($quiz_id)->id;
       return view('courseQuizes.courseQuizShowQuestion',compact('questions','quiz_id'));
    }
    public function CourseQuizShowChoices($question_id){
        //return $question_id;
        $question_name=Question::find($question_id)->question_name;
        $choices=Question::find($question_id)->choices;
        return view('courseQuizes.courseQuizShowChoices',compact('choices','question_name'));
    }

}
