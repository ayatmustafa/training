<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\OnlineClasses\Http\Controllers\OnlineClassController;

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
|                               Auth User                                  |
|--------------------------------------------------------------------------*/
Route::middleware('auth:api')->get('/OnlineClasses', function (Request $request) {
    return $request->user();
});
/*--------------------------------------------------------------------------
|                       OnlineClasses CRUD APIs                            |
|--------------------------------------------------------------------------*/
Route::group(['prefix' => '/OnlineClasses','middleware' => ['auth:api','cors', 'json']], function() {
/*--------------------------------------------------------------------------
|                  SCHOOL CRUD APIs with STUDENT ROLE                      |
|--------------------------------------------------------------------------*/
    Route::middleware(['role:SMD|TEACHER|STUDENT'])->group(function () {
        Route::post('/index', [OnlineClassController::class, 'index']);
        Route::get('/show',   [OnlineClassController::class, 'show']);
    });
/*--------------------------------------------------------------------------
|               SCHOOL CRUD APIs with TEACHER AND SMD ROLE                  |
|--------------------------------------------------------------------------*/
    Route::middleware(['role:SMD|TEACHER'])->group(function () {
        Route::get('/edit/{class}',     [OnlineClassController::class, 'edit']);
        Route::post('/store',           [OnlineClassController::class, 'store']);
        Route::patch('/update/{class}', [OnlineClassController::class, 'update']);
        Route::delete('/delete/{class}',[OnlineClassController::class, 'destroy']);
    });
});