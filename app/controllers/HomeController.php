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

	//put reused variables here to clean code up?
	//
	//end of variables

	public function showWelcome()
	{

		$players = Player::whereNotNull('school')
		->orderBy('league_points', 'DESC')
		->paginate(15);

		$matches = Match::whereNotNull('id')->orderBy('id')->paginate(15);

		$schedule = Schedule::whereNotNull('id')->orderBy('id')->paginate(15);

		return View::make('home')
			->with('title','Welcome to the North Suburban Chess League website')
			->with('announcements', Announcement::orderBy('updated_at', 'desc')->take(3)->get())
			->with('mostRecentNews', Announcement::orderBy('updated_at', 'desc')->first())


			//->with('teams',Team::all())

			->with('teams',Team::sortable()->orderBy('league_points', 'desc')->get())
			->with('schedule', $schedule)
			->with('matches', Match::orderBy('id', 'desc')->take(12)->get())
			->with('players', Player::whereNotNull('school')->orderBy('league_points', 'desc')->take(12)->get());
			
	}

	

}