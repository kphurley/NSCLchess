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
Route::get('players/new', array('before' => 'auth','as'=>'new_player','uses'=>'PlayersController@addNewPlayer'));
Route::post('players/create', array('before' => 'auth', 'uses'=>'PlayersController@createPlayer'));
Route::post('players/edit', array('before' => 'auth', 'uses'=>'PlayersController@editPlayer'));
Route::post('players/delete', array('before' => 'auth', 'uses'=>'PlayersController@deletePlayer'));

// Team routes
Route::get('teams', array('as'=> 'teams', 'uses' => 'TeamsController@showTeams'));
Route::get('team/{id}', array('as'=>'team', 'uses' => 'TeamsController@viewTeam'));

// Match routes
Route::get('matches', array('as'=>'matches', 'uses'=>'MatchesController@showMatches'));
Route::get('matches/add', array('before' => 'auth','as'=>'add_match', 'uses'=>'MatchesController@addNewMatch'));
Route::post('matches/add2', array('before' => 'auth','uses'=>'MatchesController@addNewMatchWithTeams'));
Route::get('match/{id}', array('as'=>'match', 'uses' => 'MatchesController@viewMatch'));
Route::post('matches/create', array('before' => 'auth','uses'=>'MatchesController@confirmAddMatch'));
Route::post('matches/confirm', array('before' => 'auth', 'as'=>'confirmMatch','uses'=>'MatchesController@createMatch'));

//Announcement routes
Route::get('announcement/{id}', array('as'=>'announcement', 'uses'=>'AnnouncementsController@viewNews'));
Route::get('announcements/add', array('before' => 'auth', 'as'=>'add_announcement', 'uses'=>'AnnouncementsController@addNews'));
Route::post('announcements/create', array('before' => 'auth', 'uses'=>'AnnouncementsController@createNews'));
Route::get('announcements/viewAll', array('as'=>'view_all_announcements', 'uses'=>'AnnouncementsController@viewAllNews'));

//schedule routes
Route::get('schedule', array('as'=> 'schedule', 'uses' => 'ScheduleController@viewCompleteSchedule'));

Route::get('password/remind', array('as'=>'password_remind','uses'=>'RemindersController@getRemind'));
Route::post('password/sendReminder', array('uses'=>'RemindersController@postRemind'));