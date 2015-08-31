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


// ROUTE PAGE CONTACT//
Route::get('/contact', ['uses' => 'PagesController@contact']);

// ROUTE PAGE FAQ //
Route::get('/faq', ['uses' => 'PagesController@faq']);


// ROUTE MENTIONS LEGAL //
Route::get('/mentions', ['uses' => 'PagesController@mentions']);

//////////// ACTORS ACTORS //////////////////
Route::group(['prefix' => 'actors'], function() {

// INDEX
Route::get('/index', ['uses' => 'ActorsController@index']);

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'ActorsController@create']);

// ROUTE ACTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'ActorsController@update']);

// ROUTE ACTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'ActorsController@delete']);

// ROUTE ACTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'ActorsController@read']);

});

/////////// DIRECTORS DIRECTORS //////////////////

Route::group(['prefix' => 'directors'], function() {

// INDEX
Route::get('/index', ['uses' => 'DirectorsController@index']);

// ROUTE DIRECTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'DirectorsController@create']);

// ROUTE DIRECTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'DirectorsController@update']);

// ROUTE DIRECTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete']);

// ROUTE DIRECTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'DirectorsController@read']);
});


/////////// MOVIE MOVIE ///////////////////

Route::group(['prefix' => 'movies'], function() {

// INDEX
Route::get('/index', ['uses' => 'MoviesController@index']);

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'MoviesController@create']);

// ROUTE ACTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'MoviesController@update']);

// ROUTE ACTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'MoviesController@delete']);

// ROUTE ACTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'MoviesController@read']);

});