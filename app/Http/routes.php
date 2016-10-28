<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/book',
    ['as' => 'book.index', 'uses' => 'BookController@index']
);

Route::get(
    '/book/create',
    ['as' => 'book.create', 'uses' => 'BookController@create']
);

Route::post(
    '/book',
    ['as' => 'book.store', 'uses' => 'BookController@store']
);

Route::get(
    '/book/{book}',
    ['as' => 'book.show', 'uses' => 'BookController@show']
);

Route::get(
    '/book/{book}/edit',
    ['as' => 'book.edit', 'uses' => 'BookController@edit']
);

Route::put(
    '/book/{book}',
    ['as' => 'book.update', 'uses' => 'BookController@update']
);

Route::delete(
    '/book/{book}',
    ['as' => 'book.destroy', 'uses' => 'BookController@destroy']
);
