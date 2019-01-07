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
	Route::post('compose','TrainController@compose')->name('compose');
	Route::get('search','TrainController@search')->name('search');
	Route::post('date_search','TrainController@date_search')->name('date_search');
	Route::post('detail','TrainController@detail')->name('detail');

	// to show current log in user
	Route::get('user',function ()
	{
		return \Auth::user()->email;
	})->name('date_search');


});

Route::get('/','TrainController@index')->name('home');
Route::post('test','TestController@test')->name('test');
Route::post('desc','TestController@desc')->name('desc');

Route::get('manytest','TestController@manyTest')->name('manyTest');
Route::get('withUser/{location}','TestController@withUser')->name('withUser');
Route::get('withLocation/{user}','TestController@withLocation')->name('withLocation');
