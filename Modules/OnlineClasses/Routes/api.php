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

Route::middleware('auth:api')->get('/onlineclasses', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api','cors', 'json.response']], function () {
    Route::get('/onlineclasses', function() {
        return "<img src='https://cdn.al-ain.com/lg/images/2020/11/30/100-153258-egyptian-alahly-fans-zamalek-anis-al-badri-3.jpeg' alt='القاضية ممكن'>"; 
    });
});