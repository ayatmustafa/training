<?php

use Illuminate\Support\Facades\Route;

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

// remove this block
/*--------------------------------------------------------------------------
|                               SCHOOL CRUD APIs                            |
|--------------------------------------------------------------------------*/

Route::group(['prefix' => '/ConfigModule', 'middleware' => ['auth:api', 'role:SMD', 'cors', 'json']], function () {
    // replace all five crud routes with resource ask ayat for help
    Route::resource('/schools', 'SchoolController');
/*----------------------------------------------------------------------------
|                               AcademicClasses CRUD APIs                    |
|--------------------------------------------------------------------------*/
    Route::resource('/classes', 'AcademicClassController');
/*----------------------------------------------------------------------------
|                               DivisionSubjects CRUD APIs                   |
|--------------------------------------------------------------------------*/
    Route::apiResource('/divisionSubjects', 'DivisionSubjectController');

    // wrong naming for prefix should be /divisions and you should use resource and the default resource function names ask ayat to help
 /*----------------------------------------------------------------------------
|                               Divisions CRUD APIs                          |
|--------------------------------------------------------------------------*/
    Route::apiResource('/divisions', 'DivisionController');
    Route::get('/division-byid/{school_id}', 'DivisionController@divisionBySchoolId');




/*----------------------------------------------------------------------------
|                               Sections CRUD APIs                           |
|--------------------------------------------------------------------------*/

    //    prefix should be plural like /sections
    Route::apiResource('/sections', 'SectionController');
    Route::group(['prefix' => '/sections'], function () {
        Route::get('/get-Sections/indivision/{id}','SectionController@getSectionByDivision');
        Route::post('/changeStatuss', 'SectionController@changeStatus');
    });

 /*----------------------------------------------------------------------------
|                               Grades CRUD APIs                             |
|--------------------------------------------------------------------------*/

    Route::apiResource('/grades', 'GradeController');
    Route::group(['prefix' => '/grades'], function () {
        Route::get('/getsection/{grade_id}', 'GradeController@getGradeSection');
        Route::post('/addsection/{grade_id}', 'GradeController@addGradeSection');
    });
});
