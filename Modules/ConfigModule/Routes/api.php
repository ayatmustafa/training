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
    Route::get('/getschools', 'SchoolController@getSchools');
    Route::post('/create-newschool', 'SchoolController@CreateSchool');
    Route::get('/edit-schooldata/{school_id}', 'SchoolController@editSchoolData');
    Route::post('/update-school/{school_id}', 'SchoolController@UpdateSchool');
    Route::post('/delete-school/{school_id}', 'SchoolController@deleteSchool');
});
