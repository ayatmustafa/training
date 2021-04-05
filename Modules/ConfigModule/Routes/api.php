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

Route::middleware('auth:api')->get('/configmodule', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'config'], function () {
    Route::get('/getschools','SchoolController@getSchools');
    Route::post('/create-newschool','SchoolController@CreateSchool');
    Route::get('/edit-schooldata/{school_id}','SchoolController@editSchoolData');
    Route::post('/update-school/{school_id}','SchoolController@UpdateSchool');
    Route::post('/delete-school/{school_id}','SchoolController@deleteSchool');
});

Route::group(['prefix' => 'division'], function () {
    Route::get('/getdivisions','DivisionController@getdivisions');
    Route::get('/DivisionByschoolID/{school_id}','DivisionController@DivisionByschoolID');
    Route::post('/create-newdivision','DivisionController@createDivision');
    Route::get('/editDivisionData/{division_id}','DivisionController@editDivisionData');
    Route::post('/update-division/{division_id}','DivisionController@UpdateDivision');
    

});
// Route::post('/creatediv','DivisionController@createDivision');
Route::post('/create','ConfigModuleController@create');

##############section API#################

Route::group(['prefix' => 'Section'], function () {
    Route::get('/get-allSections','SectionController@getAllSections');
    Route::post('/create-Section','SectionController@createSection');
    Route::get('/edit/{id}','SectionController@editSection');
    Route::get('/update/{id}','SectionController@updateSection');
    Route::get('/get-Sections/indivision/{id}','SectionController@getSectionByDivision');
    Route::post('/changeStatuss','SectionController@changeStatus');



});
