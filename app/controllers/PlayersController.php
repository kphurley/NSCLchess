<?php

class PlayersController extends BaseController {

	//public $restful = true;

	public function showPlayers(){
		$players = Player::whereNotNull('school')->get();


		$view = View::make('players.players')
			->with('title', 'NSCL Player List')
			->with('players', $players);

		return $view;
	}

	public function addNewPlayer(){
		return View::make('players.addNew')->with('title', 'Add new NSCL player');
	}

	public function createPlayer(){

		$validator = Validator::make(Input::all(), Player::$rules);
 
	    if ($validator->passes()) {
	        // validation has passed, save user in DB
	       Player::create(array(
			'name'=>Input::get('name'),
			'school'=>Input::get('school'),
			'Grade'=>Input::get('Grade')
		));

	    return Redirect::route('players')
			->with('message', 'Player created successfully');
		}

	   	else return Redirect::route('new_player')->with('message', 'Error creating player:  Player has already been created!');
	}

	public function viewPlayer($id){
		return View::make('player.playerview')
			->with('title', 'NSCL Player')
			->with('player', Player::find($id));
	}

}