<?php

class PlayersController extends BaseController {

	//public $restful = true;

	public function showPlayers(){
		$view = View::make('players.players')
			->with('title', 'NSCL Player List')
			->with('players', Player::all());
		return $view;
	}

	public function addNewPlayer(){
		return View::make('players.addNew')->with('title', 'Add new NSCL player');
	}

	public function createPlayer(){

		Player::create(array(
		'name'=>Input::get('name'),
		'school'=>Input::get('school'),
		'Grade'=>Input::get('Grade')
		));

		return Redirect::route('players')
			->with('message', 'Player created successfully');
	}

	public function viewPlayer($id){
		return View::make('player.playerview')
			->with('title', 'NSCL Player')
			->with('player', Player::find($id));
	}

}