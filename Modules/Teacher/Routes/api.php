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

Route::middleware('auth:api')->get('/teacher', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/teachers', 'middleware' => ['auth:api', 'role:SectionCoordinator', 'cors', 'json']], function () {
    Route::post('/create', 'TeacherController@store');
    Route::post('/upload-file', 'AgendaController@fileUpload');
    Route::get('/index', 'AgendaController@index');
});

Route::group(['prefix' => '/teachers', 'middleware' => ['auth:api', 'role:Student', 'cors', 'json']], function () {

    Route::get('/student/agenda', 'AgendaController@studentsAgenda');

});