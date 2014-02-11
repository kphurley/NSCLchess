<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=> 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('users/login', array('as'=> 'login', 'uses' => 'UsersController@showLogin'));
Route::get('users/register', array('as'=> 'register', 'uses' => 'UsersController@showRegistration'));
Route::post('users/create', array('as'=> 'create_user', 'uses' => 'UsersController@createUser'));
Route::post('users/signin', array('as'=> 'signin', 'uses' => 'UsersController@signinUser'));
Route::get('users/logout', array('as'=> 'logout', 'uses' => 'UsersController@logoutUser'));
Route::get('users/dashboard', array('as'=> 'dashboard', 'uses' => 'UsersController@getDashboard'));

// Player routes
Route::get('players', array('as'=> 'players', 'uses' => 'PlayersController@showPlayers'));
Route::get('players/new', array('as'=>'new_player','uses'=>'PlayersController@addNewPlayer'));
Route::post('players/create', array('uses'=>'PlayersController@createPlayer'));

// Team routes
Route::get('teams', array('as'=> 'teams', 'uses' => 'TeamsController@showTeams'));
Route::get('team/{id}', array('as'=>'team', 'uses' => 'TeamsController@viewTeam'));

// Match routes
Route::get('matches', array('as'=>'matches', 'uses'=>'MatchesController@showMatches'));
Route::get('matches/add', array('as'=>'add_match', 'uses'=>'MatchesController@addNewMatch'));
Route::post('matches/add2', array('uses'=>'MatchesController@addNewMatchWithTeams'));
Route::get('match/{id}', array('as'=>'match', 'uses' => 'MatchesController@viewMatch'));
Route::post('matches/create', array('uses'=>'MatchesController@confirmAddMatch'));
Route::post('matches/confirm', array('as'=>'confirmMatch','uses'=>'MatchesController@createMatch'));

