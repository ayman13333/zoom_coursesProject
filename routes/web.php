<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CourseQuizController;
use App\Models\Add;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $adds=Add::latest()->get();
    $first_add=$adds->first();
    $adds=$adds->except($first_add->id);
    return view('welcome',compact('adds','first_add'));
});

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::resource('/advertise',AdvertiseController::class);
    Route::resource('/courses',CourseController::class);
    Route::resource('/videos',VideoController::class);
    Route::resource('/quizes',QuizController::class);
    Route::resource('/coursequiz',CourseQuizController::class);

    Route::get('/coursequizshowquestion/{id}',[CourseQuizController::class,'CourseQuizShowQuestion'])->name('CourseQuizShowQuestion');
    Route::get('/coursequizshowchoices/{id}',[CourseQuizController::class,'CourseQuizShowChoices'])->name('CourseQuizShowChoices');
    Route::post('/coursequizaddquestion',[CourseQuizController::class,'CourseQuizAddQuestion'])->name('CourseQuizAddQuestion');
    Route::post('/coursequizaddchoice',[CourseQuizController::class,'CourseQuizAddChoice'])->name('CourseQuizAddChoice');
    Route::get('/freequiz',[QuizController::class,'freeQuiz'])->name('freeQuiz');
    Route::get('/freequiz/{id}/coursename/{coursename}',[QuizController::class,'addQuiz'])->name('addQuiz');
    Route::post('/freequizaddquestion',[QuizController::class,'freeQuizAddQuestion'])->name('freeQuizAddQuestion');
    Route::POST('/freequizaddchoice',[QuizController::class,'freeQuizAddChoice'])->name('freeQuizAddChoice');

    Route::get('/confirmdeletecourse/{id}',[CourseController::class,'confirmDeleteCourse'])->name('confirmDeleteCourse');
    Route::get('/coursevideos/{id}/coursename/{coursename}',[CourseController::class,'addVideos'])->name('addVideos');
    Route::POST('/insertvideodata',[CourseController::class,'insertVideoData'])->name('insertVideoData');
    Route::get('/opencourse/{id}',[CourseController::class,'openCourse'])->name('openCourse');
    Route::get('/closecourse/{id}',[CourseController::class,'closeCourse'])->name('closeCourse');
});
Route::get('/freecourses',[UserController::class,'freeCourses'])->name('freeCourses');
Route::get('/paidcourses',[UserController::class,'paidCourses'])->name('paidCourses');
Route::get('/dailyquiz',[QuizController::class,'dailyQuiz'])->name('dailyQuiz');
Route::get('/dailyquiznextquestion/{id}',[QuizController::class,'dailyQuizNextQuestion'])->name('dailyQuizNextQuestion');
Route::get('/dailyquizquestionanswer/{id}',[QuizController::class,'dailyQuizQuestionAnswer'])->name('dailyQuizQuestionAnswer');
Route::middleware(['auth'])->prefix('user')->group(function(){
    Route::resource('/users',UserController::class);
    Route::POST('/bookorder',[UserController::class,'bookOrder'])->name('bookOrder');
    Route::get('/videolist/{id}',[UserController::class,'videoList'])->name('videoList');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
