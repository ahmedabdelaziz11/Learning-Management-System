<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('teacher_register','TeachersController@register')->name('teacher_register');
Route::middleware('auth:teacher')->group(function () {

        /** --------------------- teacher  ----------------------- **/
    Route::get('dashboard','TeachersController@index')->name('dashboard');
    Route::get('profile','TeachersController@show')->name('profile');
    Route::post('teacher_update/{teacher}','TeachersController@update')->name('teacher_update');
    Route::get('MarkAsReadAll','TeachersController@markAsReadAll')->name('MarkAsReadAll');
    

    /** --------------------- courses  ----------------------- **/
    Route::resource('courses', 'CoursesController');

    /** ----------------------- lessons  ----------------------- **/
    Route::resource('{course_by_id}/lessons', 'lessonsController');
    Route::get('get_lessons/{course_id}','lessonsController@getLessons');


    /** ----------------- lessons attachment ----------------------- **/
    Route::resource('attachments', 'AttachmentsController');
    Route::get('download_file/{course_id}/{lesson_id}/{file_name}','AttachmentsController@downloadFile');
    Route::post('delete_file/{course_id}/{lesson_id}/{file_name}','AttachmentsController@destroy')->name('delete_file');
    Route::get('view_file/{course_id}/{lesson_id}/{file_name}','AttachmentsController@viewFile');


    /** ----------------- lessons video ----------------------- **/
    Route::post('add-lesson-video', 'LessonVideoController@store')->name('add-lesson-video');
    Route::get('view_video/{video_url}','LessonVideoController@show');
    Route::get('download_video/{lesson_id}','LessonVideoController@download');
    Route::post('delete-lesson-video', 'LessonVideoController@destroy')->name('delete-lesson-video');


    /** -------------------- quizzes ----------------------- **/
    Route::resource('quizzes', 'QuizzesController');
    Route::post('addQuizzeToLesson', 'QuizzesController@addQuizzeToLesson')->name('addQuizzeToLesson');

    /** -------------------- questions----------------------- **/
    Route::resource('questions', 'QuestionsController');

    /** -------------------- answers----------------------- **/
    Route::resource('answers', 'AnswersController');

    /** -------------------- messaging ----------------------- **/
    Route::get('getchat/{id?}/{notifi_id?}','MessagingController@getchat');
    Route::post('deletechat','MessagingController@deleteChat');



});



