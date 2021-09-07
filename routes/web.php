<?php

use App\Http\Livewire\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

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
Route::get('teacher/login',[App\Http\Controllers\Teacher\TeachersController::class, 'login'])->name('teacher.login');
Route::post('teacher/login',[App\Http\Controllers\Teacher\TeachersController::class, 'checkLogin'])->name('save.teacher.login');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:user')->namespace('student')->prefix('student')->group(function () {

    /** -----------------------  student   ----------------------- **/
    Route::get('dashboard','UsersController@index')->name('student/dashboard');
    Route::get('profile','UsersController@show')->name('student/profile');
    Route::post('student-update/{user}','UsersController@update')->name('student_update');
    Route::get('student/MarkAsReadAll','UsersController@markAsReadAll')->name('MarkAsReadAllStudent');

    /** -----------------------  messaging   ----------------------- **/
    Route::get('getchat/{id?}/{notifi_id?}','MessagingController@getchat');

    /** -----------------------  courses   ----------------------- **/
    Route::get('browse-courses', 'CoursesController@browseCourses');
    Route::get('mycourses', 'CoursesController@myCourses');
    Route::get('show-course/{course}', 'CoursesController@show')->middleware('HasSubscribe')->name('show-course');
    Route::get('course-preview/{course}', 'CoursesController@preview')->name('course-preview');
    Route::post('subscribe', 'CoursesController@subscribe')->name('subscribe');
    Route::post('rate_course', 'CoursesController@rateCourse')->name('rate_course');
    
    
    /** -----------------------  lessons   ----------------------- **/
    Route::get('show-lesson/{lesson}', 'LessonsController@show_lesson')->middleware('AuthorizedToViewLesson')->name('show-lesson');

    /** -----------------------  Quizzes   ----------------------- **/
    Route::get('take-quizze/{quizze_id}', 'QuizzesController@takeQuizze')->middleware('TakeQuizze')->name('take_quizze');
    Route::post('quizze_result', 'QuizzesController@quizzeResult')->name('quizze_result');
    Route::post('quizze_reset', 'QuizzesController@quizzeReset')->name('quizze_reset');

    /** -----------------------  teacher   ----------------------- **/
    Route::get('teacher/profile/{teacher:name}','UsersController@showTeacherProfile')->name('student/teacher/profile');

    /** ----------------- lessons attachment ----------------------- **/
    Route::get('download_file/{course:id}/{lesson_id}/{file_name}','AttachmentsController@downloadFile');
    Route::get('view_file/{course:id}/{lesson_id}/{file_name}','AttachmentsController@viewFile');

});






