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


Route::get('/', ['uses' => 'IndexController@index', 'as' => 'home']);

Route::get('/advanced', ['uses' => 'AdvancedController@index', 'as' => 'advanced']);

Route::get('/professional', ['uses' => 'ProfessionalController@index', 'as' => 'professional']);

// Route SELECT ACTION ALL
Route::get('/taskaction/', ['uses' => 'AdvancedController@taskaction', 'as' => 'task.action']);

///// ROUTE CONTROLLER ///////
Route::controller('category','CategoryController',array(
    'getIndex'     => 'category.index',
    'getUpdate'     => 'category.update',
    'getCreate'     => 'category.create',
    'getDelete'      => 'category.delete',
    'getRead'       => 'category.read',
    'postPost' => 'category.post'
));

Route::controller('cinema','CinemaController');

Route::get('/movies-realtime', ['uses' => 'IndexController@realtime',
    'as' => 'index.realtime']);


// ROUTE PAGE CONTACT//
Route::get('/contact', ['uses' => 'PagesController@contact', 'as' => 'contact']);

// ROUTE PAGE FAQ //
Route::get('/faq', ['uses' => 'PagesController@faq', 'as' => 'faq']);

// ROUTE MENTIONS LEGAL //
Route::get('/mentions', ['uses' => 'PagesController@mentions', 'as' => 'mentions']);

// ROUTE INDEX //
Route::get('/index', ['uses' => 'IndexController@index', 'as' => 'home']);

// ROUTE CONCECPT
Route::get('/concept', ['uses' => 'PagesController@concept', 'as' => 'concept']);

//////////// ACTORS ACTORS //////////////////
Route::group(['prefix' => 'actors'], function() {

// INDEX
Route::get('/index/{ville?}', ['uses' => 'ActorsController@index', 'as' => 'actors.index']);;

// ROUTE ACTORS CONTROLLER CREATE
Route::get('/create', ['uses' => 'ActorsController@create', 'as' => 'actors.create']);
    Route::post('/post', ['uses' => 'ActorsController@post', 'as' => 'actors.post']);

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
    Route::post('/post', ['uses' => 'DirectorsController@post', 'as' => 'directors.post']);
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

// ROUTE DASHBOARD ADD MOVIE
    Route::post('/postfast', ['uses' => 'MoviesController@postfast', 'as' => 'movies.postfast']);


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
    Route::post('/post', ['uses' => 'MoviesController@post', 'as' => 'movies.post']);
// Route COVER + COVERIMG
    Route::get('/cover/{id}/{cover}', ['uses' => 'MoviesController@cover', 'as' => 'movies.cover']);
    Route::get('/visible/{id}/{visible}', ['uses' => 'MoviesController@visible', 'as' => 'movies.visible']);
// Route SELECT ACTION ALL
    Route::get('/select/', ['uses' => 'MoviesController@select', 'as' => 'movies.select']);
    // CAT -> MOVIES
    Route::get('/', ['uses' => 'MoviesController@category', 'as' => 'movies.category']);

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

// COMMENTS COMMENTS COMMENTS //
Route::group(['prefix' => 'comments'], function() {
// INDEX
    Route::get('/index/', ['uses' => 'CommentsController@getIndex', 'as' => 'comments.index']);
    // Route SELECT ACTION ALL
    Route::get('/select/', ['uses' => 'CommentsController@select', 'as' => 'comments.select']);

});