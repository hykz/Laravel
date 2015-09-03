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

///// ROUTE CONTROLLER ///////
Route::controller('category','CategoryController',array(
    'getIndex'     => 'category.index',
    'getUpdate'     => 'category.update',
    'getCreate'     => 'category.create',
    'getDelete'      => 'category.delete',
    'getRead'       => 'category.read'
));
Route::controller('cinema','CinemaController');


// ROUTE PAGE CONTACT//
Route::get('/contact', ['uses' => 'PagesController@contact', 'as' => 'contact']);

// ROUTE PAGE FAQ //
Route::get('/faq', ['uses' => 'PagesController@faq', 'as' => 'faq']);

// ROUTE MENTIONS LEGAL //
Route::get('/mentions', ['uses' => 'PagesController@mentions', 'as' => 'mentions']);

// ROUTE INDEX //
Route::get('/index', ['uses' => 'PagesController@index', 'as' => 'home']);

// ROUTE CONCECPT
Route::get('/concept', ['uses' => 'PagesController@concept', 'as' => 'concept']);

//////////// ACTORS ACTORS //////////////////
Route::group(['prefix' => 'actors'], function() {

// INDEX
Route::get('/index/{ville?}', ['uses' => 'ActorsController@index', 'as' => 'actors.index']);;

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'ActorsController@create', 'as' => 'actors.create']);

// ROUTE ACTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'ActorsController@update' , 'as' => 'actors.update'])->where('id', '[0-9]+');;

// ROUTE ACTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'ActorsController@delete', 'as' => 'actors.delete'])->where('id', '[0-9]+');;

// ROUTE ACTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'ActorsController@read' , 'as' => 'actors.read'])->where('id', '[0-9]+');;

});

/////////// DIRECTORS DIRECTORS //////////////////

Route::group(['prefix' => 'directors'], function() {

// INDEX
Route::get('/index/{ville?}', ['uses' => 'DirectorsController@index', 'as' => 'directors.index']);

// ROUTE DIRECTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'DirectorsController@create', 'as' => 'directors.create']);

// ROUTE DIRECTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'DirectorsController@update', 'as' => 'directors.update'])->where('id', '[0-9]+');

// ROUTE DIRECTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete', 'as' => 'directors.delete'])->where('id', '[0-9]+');;

// ROUTE DIRECTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'DirectorsController@read', 'as' => 'directors.read'])->where('id', '[0-9]+');;
});


/////////// MOVIE MOVIE ///////////////////

Route::group(['prefix' => 'movies'], function() {

// INDEX
Route::get('/index/{val?}', ['uses' => 'MoviesController@index', 'as' => 'movies.index']);

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'MoviesController@create', 'as' => 'movies.create']);

// ROUTE ACTORS CONTROLLER UPDATE
Route::get('/update/{id}', ['uses' => 'MoviesController@update', 'as' => 'movies.update'])->where('id', '[0-9]+');;

// ROUTE ACTORS CONTROLLER DELETE
Route::get('/delete/{id}', ['uses' => 'MoviesController@delete', 'as' => 'movies.delete'])->where('id', '[0-9]+');;

// ROUTE ACTORS CONTROLLER READ
Route::get('/read/{id}', ['uses' => 'MoviesController@read', 'as' => 'movies.read'])->where('id', '[0-9]+');

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/search/{lan?}/{vis?}/{test?}', ['uses' => 'MoviesController@search', 'as' => 'movies.search'])->where(array('lan' => '(FR|DE|EN)' , 'vis' => '[0-1]', 'time'=> '[0-9]' ));

// Route COVER + COVERIMG
    Route::get('/cover/{id}/{cover}', ['uses' => 'MoviesController@cover', 'as' => 'movies.cover']);
    Route::get('/visible/{id}/{visible}', ['uses' => 'MoviesController@visible', 'as' => 'movies.visible']);
// Route BTN SEARCH
    Route::get('/btnsearch/', ['uses' => 'MoviesController@btnsearch', 'as' => 'movies.btnsearch']);
});

/////////// USER USER ////////////////////////

Route::group(['prefix' => 'users'], function() {
Route::get('/index', ['uses' => 'UsersController@index', 'as' => 'users.index']);
Route::get('/create', ['uses' => 'UsersController@create', 'as' => 'users.create']);
Route::get('/delete/{id}', ['uses' => 'UsersController@delete', 'as' => 'users.delete']);
Route::get('/update{id}', ['uses' => 'UsersController@update', 'as' => 'users.update']);
Route::get('/read', ['uses' => 'UsersController@read', 'as' => 'users.read']);
Route::get('/search/{zipcode?}/{city?}/{enable?}', ['uses' => 'UsersController@search', 'as' => 'users.search'])->where(array( 'zipcode' => '[0-9]{5}', 'enable'=> '0|1','city' => '[a-zA-Z-]+' ));
});