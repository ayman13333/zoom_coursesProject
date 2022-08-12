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
class QuizController extends Controller
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
        //return 'done';
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
        $question_name=Question::find($id)->question_name;
        $choices=Question::find($id)->choices;
        return view('quizes.showChoices',compact('choices','question_name'));
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
       Question::find($id)->choices()->delete();
       $question_image=Question::find($id)->image;
       $img_destination = 'storage/quizes/' . $question_image;
       if (File::exists($img_destination)) {
           File::delete($img_destination);
       }

       Question::find($id)->delete();
       return redirect()->back();

    }
    public function freeQuiz(){
      $freeQuiz=Course::where('type','freequiz')->get();

      if($freeQuiz->isEmpty()){
       $course= Course::create([
        'name'=>'freequiz',
        'image'=>0,
        'price'=>0,
        'rate'=>0,
        'description'=>0,
        'type'=>'freequiz',
        ]);
        $course_id=$course->id;
        $course_name=$course->name;

       return view('quizes.freeQuiz',compact('course_id','course_name'));

      }else{
        $course_id= $freeQuiz[0]->id;
        $course_name=$freeQuiz[0]->name;
        // $id=$freeQuiz[0]->quizes[0]->id;
        // return Quiz::find($id)->questions;
        return view('quizes.freeQuiz',compact('course_id','course_name'));
      }
    }
    public function addQuiz($course_id,$course_name){

        $freeQuiz=Quiz::where('course_id',$course_id)->get();
        if($freeQuiz->isEmpty()){
            $quiz=Quiz::create([
                'name'=>$course_name,
                'course_id'=>$course_id
               ]);
               $quiz_id=$quiz->id;
               $quiz_name=$quiz->name;
               $questions=Question::where('quiz_id',$quiz_id)->get();
               return view('quizes.freeQuizQuestions',compact('quiz_id','questions','quiz_name'));
        }
        else{
            $quiz_id=$freeQuiz[0]->id;
            $quiz_name=$freeQuiz[0]->name;
            $questions=Question::where('quiz_id',$quiz_id)->get();
            return view('quizes.freeQuizQuestions',compact('quiz_id','questions','quiz_name'));
        }

    }
    public function freeQuizAddQuestion(Request $request)
    {
        // return $request->image;
        if($request->image==null){
            $question=Question::create([
                'question_name'=>$request->question_name,
                'quiz_id'=>$request->quiz_id
               ]);
        }
        else{
            $question_pic = $request->image;
            $question_pic_name = time() . '.' . $question_pic->extension();
            Storage::putFileAs('public/quizes', $question_pic,  $question_pic_name);
            $question=new Question;
            $question->question_name=$request->question_name;
            $question->quiz_id=$request->quiz_id;
            $question->image=$question_pic_name;
            $question->save();
        }

       $question_id=$question->id;
       $question_name=$question->question_name;
       $flag=0;
      return view('quizes.freeQuizChoices',compact('question_id','question_name','flag'));
    }
    public function freeQuizAddChoice(Request $request)
    {
       $question_id= $request->question_id;
       $question_name= $request->question_name;
        $request->answer==null ? $answer=0 :$answer=1 ;
        $flag=1;
       Choice::create([
        'answer'=>$answer,
        'question_id'=>$request->question_id,
        'choice_name'=>$request->choice_name
       ]);
       return view('quizes.freeQuizChoices',compact('question_id','question_name','flag'))->with('free_added', 'تم اضافة الاختيار بنجاح');
    }
    public function dailyQuiz()
    {
       $freeQuiz=Quiz::where('name','freequiz')->get();
       $question_name=$freeQuiz[0]->questions->first()->question_name;
      // $question_image=$freeQuiz[0]->questions->first()->image;
       $question_id=$freeQuiz[0]->questions->first()->id;
       $choices=Question::with('choices')-> find($question_id)->choices;
        return view('dailyQuiz',compact('question_name','choices','question_id'));
    }
    public function dailyQuizNextQuestion($question_id)
    {
        try {
            $question_name= Question::find($question_id)->orderBy('id')->where('id', '>', $question_id)->first()->question_name;
        //    $question_image=Question::find($question_id)->orderBy('id')->where('id', '>', $question_id)->first()->image;
            $question_id= Question::find($question_id)->orderBy('id')->where('id', '>', $question_id)->first()->id;
            $choices=Question::with('choices')-> find($question_id)->choices;
            return view('dailyQuiz',compact('question_name','choices','question_id'));
        } catch (Exception $e) {
            return view('finishDailyQuiz');
        }
    }
    public function dailyQuizQuestionAnswer($choice_id)
    {
       // return $choice_id;
       $answer=Choice::find($choice_id)->answer;
       if($answer==1){
        return redirect()->back()->with('true','اجابة صحيحة');
       }
       else{
        return redirect()->back()->with('false','اجابة خاطئة');
       }
    }
}
