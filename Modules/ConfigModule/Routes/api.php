<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\ConfigModule\Http\Controllers\ClassesController;
use Modules\ConfigModule\Http\Controllers\SchoolController;

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

/*--------------------------------------------------------------------------
|                                Auth User                                  |
|--------------------------------------------------------------------------*/
Route::middleware('auth:api')->get('/ConfigModule', function (Request $request) {
    return $request->user();
});

/*--------------------------------------------------------------------------
|                               SCHOOL CRUD APIs                            |
|--------------------------------------------------------------------------*/

Route::group(['prefix' => '/ConfigModule','middleware' => ['auth:api', 'role:SMD','cors', 'json']], function() {
    Route::group(['prefix' => '/school'], function() {
        Route::get('/index',              [SchoolController::class, 'index']);
        Route::get('/show',               [SchoolController::class, 'show']);
        Route::get('/show/{school}',      [SchoolController::class, 'getSchool']);
        Route::get('/edit/{school}',      [SchoolController::class, 'edit']);
        Route::post('/store',             [SchoolController::class, 'store']);
        Route::post('/update/{school}',   [SchoolController::class, 'update']);
        Route::delete('/delete/{school}', [SchoolController::class, 'destroy']);
    });
    
/*----------------------------------------------------------------------------
|                               Classes CRUD APIs                            |
|--------------------------------------------------------------------------*/
    Route::group(['prefix' => '/class'], function() {
        Route::get('/index',             [ClassesController::class, 'index']);
        Route::get('/show/{class}',      [ClassesController::class, 'show']);
        Route::get('/edit/{class}',      [ClassesController::class, 'edit']);
        Route::post('/store',            [ClassesController::class, 'store']);
        Route::post('/update/{class}',   [ClassesController::class, 'update']);
        Route::delete('/delete/{class}', [ClassesController::class, 'destroy']);
    });

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

    Route::group(['prefix' => '/section'], function () {
        Route::get('/get-allSections','SectionController@getAllSections');
        Route::post('/create-Section','SectionController@createSection');
        Route::get('/edit/{id}','SectionController@editSection');
        Route::get('/update/{id}','SectionController@updateSection');
        Route::get('/get-Sections/indivision/{id}','SectionController@getSectionByDivision');
        Route::post('/changeStatuss','SectionController@changeStatus');
    });

});
