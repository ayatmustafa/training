<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Config\Http\Controllers\SchoolRepositoryController;

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

Route::middleware('auth:api')->get('/config', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'config','middleware' => ['auth:api', 'role:SMD','cors', 'json']], function() {
    Route::get('school/index', [SchoolRepositoryController::class,  'index']);
    Route::get('school/show', [SchoolRepositoryController::class,  'show']);
    Route::get('school/show/{school}',  [SchoolRepositoryController::class,  'getSchool']);
    Route::get('school/edit/{school}', [SchoolRepositoryController::class, 'edit']);
    Route::post('school/store', [SchoolRepositoryController::class, 'store']);
    Route::post('school/update/{school}', [SchoolRepositoryController::class,  'update']);
    Route::delete('school/delete/{school}', [SchoolRepositoryController::class,  'destroy']);
});