<?php

class TeamsController extends BaseController {
	
	public function showTeams(){
		$view = View::make('teams.teams')
			->with('title', 'NSCL Player List')
			->with('teams', Team::all());  
			//need to send the array with match results here
		return $view;
	}

	public function viewTeam($id){
		return View::make('teams.teamview')
			->with('title', 'NSCL Team')
			->with('team', Team::find($id))
			->with('players', Player::all());
		
	}
}