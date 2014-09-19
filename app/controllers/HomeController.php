<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		$players = Player::whereNotNull('school')
		->orderBy('league_points', 'DESC')
		->paginate(15);

		$matches = Match::whereNotNull('id')->orderBy('id')->paginate(15);

		$schedule = Schedule::whereNotNull('date')->orderBy('id')->paginate(15);

		return View::make('home')
			->with('title','Welcome to the North Suburban Chess League website')
			->with('announcements', Announcement::orderBy('updated_at', 'desc')->take(3)->get())
			->with('mostRecentNews', Announcement::orderBy('updated_at', 'desc')->first())
			->with('teams',Team::all())
			->with('schedule', $schedule)
			->with('matches', $matches)
			->with('players', $players);
			
	}

}