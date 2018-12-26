<?php

// use Illuminate\Http\Request;


// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |


// Route::post('test','TestController@test');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login','Authenticate@login');

Route::middleware('auth:api')->group(function() {
	Route::post('logout','Authenticate@logout');
	Route::get('inbox','TrainController@inbox')->name('inbox');
	Route::get('about','TrainController@draft')->name('about');


});

Route::get('/','TrainController@index')->name('home');
