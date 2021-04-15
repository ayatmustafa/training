<?php

use Illuminate\Http\Request;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/student', 'middleware' => ['auth:api', 'role:SMD', 'cors', 'json']], function () {


    Route::get('/all', 'StudentController@index');
    Route::get('/studrnt-division/{division_id}', 'StudentController@StudentsInDivision');
    Route::get('/studrnt-section/{section_id}', 'StudentController@StudentsInSection');
    Route::get('/studrnt-grade/{grade_id}', 'StudentController@StudentsInGrade');
    Route::post('/addstudent-grade', 'StudentController@AddStudentToGrade');
});

Route::group(['prefix' => '/student', 'middleware' => ['auth:api', 'role:Student', 'cors', 'json']], function () {
    Route::get('/create', 'StudentController@create');
    Route::get('/edit/{student_id}', 'StudentController@edit');
    Route::get('/update/{student_id}', 'StudentController@Update');
});
