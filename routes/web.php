<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// // ,'admin.activate'

// Route::middleware(['admin.auth'])->group(function(){
// 	Route::get('/','TrainController@index')->name('home');
// 	Route::prefix('mail')->name('mail.')->group(function()
// 	{
// 		Route::get('inbox','TrainController@inbox')->name('inbox');
// 		Route::get('compose_page','TrainController@compose_page')->name('compose_page');
// 		Route::get('compose/{id?}','TrainController@compose')->name('compose');
// 		Route::post('compose','TrainController@compose')->name('compose');
// 		Route::get('draft','TrainController@draft')->name('draft_page');
// 		Route::get('draft_detail/{id}','TrainController@draft_detail')->name('draft_detail');
// 		Route::get('detail/{id}','TrainController@detail')->name('read_detail');
// 		Route::get('send_page','TrainController@send_page')->name('send_page');

// 		Route::post('search','TrainController@search')->name('search');
// 		Route::get('news_letter_page','TrainController@news_letter_page')->name('news_letter_page');
// 		Route::post('pre_pdf','TrainController@preview_pdf')->name('pre_pdf');
// 		Route::get('make_pdf','TrainController@make_pdf')->name('make_pdf');
// 	});
// 	Route::get('/logout','AuthController@logout')->name('logout');
// });

// Route::get('/login','AuthController@login')->name('login');
// Route::post('/loginsubmit','AuthController@loginSubmit');

// Route::get('/register','AuthController@register');
// Route::post('/register','AuthController@store');
// Route::get('/activate_page/{email}','AuthController@activate_page')->name('activate');
// Route::get('/activate/{id}','AuthController@activate');
// // Route::get('/image/{image}','TrainController@get_image')->name('image');

// Route::get('/image/{image}',function($image)
// {

// 	$path = storage_path().'/app/images/'.$image;

// 	if(!File::exists($path)){
// 		abort(404);
// 	}

// 	$file = File::get($path);
// 	$type = File::mimeType($path);

// 	$response = Response::make($file,200);
// 	$response -> header("Content-Type" , 200);
// 	return $response;

// 	// dd($path);

// })->name('image');

Route::get('{all?}', function () {
    return view('welcome');
})->where(['all' => '.*']);