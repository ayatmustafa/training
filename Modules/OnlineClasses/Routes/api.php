<?php

use Illuminate\Support\Facades\Route;
use Modules\OnlineClasses\Http\Controllers\OnlineClassesController;

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
|                       OnlineClasses CRUD APIs                            |
|--------------------------------------------------------------------------*/
Route::group(['prefix' => '/OnlineClasses','middleware' => ['auth:api','cors', 'json']], function() {
/*--------------------------------------------------------------------------
|                  SCHOOL CRUD APIs with STUDENT ROLE                      |
|--------------------------------------------------------------------------*/
    Route::middleware(['role:SMD|TEACHER|STUDENT'])->group(function () {
        Route::post('/index', [OnlineClassesController::class, 'index']);
        Route::get('/show',   [OnlineClassesController::class, 'show']);
    });
/*--------------------------------------------------------------------------
|               SCHOOL CRUD APIs with TEACHER AND SMD ROLE                  |
|--------------------------------------------------------------------------*/
        Route::resource('/onlineClasses',     'OnlineClassesController')->middleware(['role:SMD|TEACHER']);
});
