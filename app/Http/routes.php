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

use App\Match;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/teams', 'AdminTeamsController');
    Route::resource('admin/matches', 'AdminMatchesController');
    Route::resource('admin/predictions', 'AdminPredictionsController', ['except'=> ['create', 'edit', 'destroy']]);

});


Route::group(['middleware' => 'auth'], function(){

    Route::get('/matches', function(){
        $matches = Match::all();

        return view('matches', compact('matches'));
    });

    Route::get('matches/{match_id}/prediction/', ['as'=> 'predict.create', 'uses'=> 'PredictionsController@create']);

    Route::resource('predictions', 'PredictionsController', ['except'=> ['create', 'destroy']]);

});




