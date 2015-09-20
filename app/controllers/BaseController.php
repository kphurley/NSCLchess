<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	

	protected function setupLayout()
	{

		$teams = Team::all();

		if(Auth::check())	
			$currentUser = Auth::user()->school;
		else
			$currentUser = null;

		View::share('teams', $teams);
		View::share('currentUser', $currentUser);
		


		if ( ! is_null($this->layout))
		{
			
			$this->layout = View::make($this->layout)
							->with('teams', $teams)
							->with('currentUser', $currentUser);
			

			
		}
	}


	

	/*THIS WAS AN ATTEMPT TO CHANGE THE SEASON VIEW ON ALL PAGES.  NOT IMPLEMENTED YET.

	public function changeSeasonCurrent(){

		$season = 'current';
	    return Redirect::route('home');
			   	
	}

	public function changeSeason2014(){

		$season = '2014';
	    return Redirect::route('home');
			   	
	}
	*/

	


}