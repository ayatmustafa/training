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
// Route::middleware('auth:api')->get('/ConfigModule', function (Request $request) {
//    return $request->user();
//});

/*--------------------------------------------------------------------------
|                               SCHOOL CRUD APIs                            |
|--------------------------------------------------------------------------*/

Route::group(['prefix' => '/ConfigModule','middleware' => ['auth:api', 'role:SMD','cors', 'json']], function() {
        // replace all five crud routes with resource ask ayat for help
    Route::apiResource('/Schools', 'SchoolController');
/*----------------------------------------------------------------------------
|                               AcademicClasses CRUD APIs                    |
|--------------------------------------------------------------------------*/
    Route::apiResource('/AcademicClasses', 'AcademicClassController');
/*----------------------------------------------------------------------------
|                               DivisionSubjects CRUD APIs                   |
|--------------------------------------------------------------------------*/
    Route::apiResource('/DivisionSubject', 'DivisionSubjectController');
    
    // wrong naming for prefix should be /divisions and you should use resource and the default resource function names ask ayat to help
    Route::group(['prefix' => '/division'], function () {
        Route::get('/getdivisions','DivisionController@getdivisions');
        Route::get('/DivisionByschoolID/{school_id}','DivisionController@DivisionByschoolID');
        Route::post('/create-newdivision','DivisionController@createDivision');
        Route::get('/editDivisionData/{division_id}','DivisionController@editDivisionData');
        Route::post('/update-division/{division_id}','DivisionController@UpdateDivision');
    });

    // Route::post('/creatediv','DivisionController@createDivision');
    Route::post('/create','ConfigModuleController@create');

    ##############section API#################

//    prefix should be plural like /sections
    Route::group(['prefix' => '/section'], function () {
        Route::get('/get-allSections','SectionController@getAllSections');
        Route::post('/create-Section','SectionController@createSection');
        Route::get('/edit/{id}','SectionController@editSection');
        Route::get('/update/{id}','SectionController@updateSection');
        Route::get('/get-Sections/indivision/{id}','SectionController@getSectionByDivision');
        Route::post('/changeStatuss','SectionController@changeStatus');
    });
    Route::group(['prefix' => '/Grade'], function () {

        Route::post('/create','GradeController@createGrade');
        Route::get('/getall','GradeController@GetAllGrades');
        Route::get('/get/{grade_id}','GradeController@getGrade');
        Route::get('/getsection/{grade_id}','GradeController@getGradeSection');
        Route::post('/addsection/{grade_id}','GradeController@AddGradeSection');
        Route::post('/update/{grade_id}','GradeController@updateGrade');

    });
});
