<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('polls.index');
});*/

Route::get('welcome', function () {
    return view('pages.welcome');
});

Route::get('/', ['as' => 'poll.index', 'uses' => 'PollController@index']);

Route::get('poll/{question_id}', ['as' => 'poll.show', 'uses' => 'PollController@show']);

Route::resource('question', 'QuestionController');

Route::get('question/{question_id}/result', ['as' => 'question.result', 'uses' => 'QuestionController@results']);

Route::post('option/{question_id}', ['as' => 'option.store', 'uses' => 'OptionController@store'])->middleware('admin');

Route::get('option/{option_id}/edit/{question_id}', ['as' => 'option.edit', 'uses' => 'OptionController@edit']);

Route::put('option/{option_id}/{question_id}', ['as' => 'option.update', 'uses' => 'OptionController@update']);

Route::delete('option/{option_id}/{question_id}', ['as' => 'option.destroy', 'uses' => 'OptionController@destroy']);

Route::post('poll/{question_id}', ['as' => 'poll.vote', 'uses' => 'PollController@vote']);

Auth::routes();
