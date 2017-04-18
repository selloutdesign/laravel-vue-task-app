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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource( 'api\tasks', 'Api\TaskController', ['only' => [
//     'index', 'create', 'show', 'update'
// ]] );

Route::group(['middleware' => 'api'], function() {
    Route::get('tasks', 'Api\TaskController@index');
    Route::get('task/{id}', 'Api\TaskController@show');
    Route::post('task/store', 'Api\TaskController@store');
    Route::patch('task/{id}', 'Api\TaskController@update');
    Route::delete('task/{id}', 'Api\TaskController@destroy');

    // Route::get('task/{id}', function($id) {
    //     return App\Task::findOrFail($id);
    // });

    // Route::post('task/store', function(Request $request) {
    //     return App\Task::create(['body' => $request->input(['body'])]);
    // });

    // Route::patch('task/{id}', function(Request $request, $id) {
    //     App\Task::findOrFail($id)->update(['body' => $request->input(['body'])]);
    // });

    // Route::delete('task/{id}', function($id) {
    //     return App\Task::destroy($id);
    // });
});