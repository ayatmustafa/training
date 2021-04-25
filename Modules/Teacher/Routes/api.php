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

Route::group(['prefix' => '/teachers', 'middleware' => ['auth:api', 'role:SMD', 'cors', 'json']], function () {
    Route::apiResource('/section-coordinador', 'TeacherController');

});
Route::group(['prefix' => '/teachers', 'middleware' => ['auth:api', 'role:SectionCoordinator', 'cors', 'json']], function () {
    Route::post('/upload-file', 'AgendaController@fileUpload');
    Route::get('/index', 'AgendaController@index');
    Route::get('/show', 'AgendaController@show');
    Route::post('/update/{id}', 'AgendaController@update');

});

Route::group(['prefix' => '/teachers', 'middleware' => ['auth:api', 'role:Student', 'cors', 'json']], function () {

    Route::get('/student/agenda', 'AgendaController@studentsAgenda');

});