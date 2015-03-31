<?php

class PlayersController extends BaseController {

	//public $restful = true;

	public function showPlayers(){
		$players = Player::whereNotNull('school')
		->sortable()
		->paginate(15);

		


		$view = View::make('players.players')
			->with('title', 'NSCL Player List')
			->with('players', $players);


		return $view;
	}

	public function addNewPlayer(){
		return View::make('players.addNew')->with('title', 'Add new NSCL player');
	}

	public function createPlayer(){

		$firstName = Input::get('firstName');
		$space = ' ';
		$lastName = Input::get('lastName');

		$team = Team::where('school', Input::get('school'))->first();

		$name = $firstName.$space.$lastName;

		//$validator = Validator::make(Input::all(), Player::$rules);
 
	    //if ($validator->passes()) {
	        // validation has passed, save user in DB
	       Player::create(array(
			'firstName'=>Input::get('firstName'),
			'lastName'=>Input::get('lastName'),
			'name'=>$name,
			'school'=>Input::get('school'),
			'Grade'=>Input::get('Grade')
		));

	       
		//return Redirect::route('users.courses.forums.index', 
                            //array(Auth::user()->username, $course->id));

	    if(Auth::check())
	    	{
	    		return Redirect::route('dashboard')
				->with('message', 'Player created successfully');
			}

	    else
	    	{
	    		return Redirect::route('team', array($team->id))
			->with('message', 'Player created successfully');
		}
		

	   	//else return Redirect::route('new_player')->with('message', 'Error creating player:  Player has already been created!');
	}

	public function editPlayer()
	{
		$thisPlayerID = Input::get('id');
		$thisPlayer = Player::find($thisPlayerID);

		$firstName = Input::get('firstName');
		$space = ' ';
		$lastName = Input::get('lastName');

		$name = $firstName.$space.$lastName;

		$thisPlayer->firstName = $firstName;
		$thisPlayer->save();
		$thisPlayer->lastName = $lastName;
		$thisPlayer->save();
		$thisPlayer->name= $name;
		$thisPlayer->save();
		$thisPlayer->Grade = Input::get('Grade');
		$thisPlayer->save();

		return Redirect::route('dashboard')
				->with('message', 'Player edited successfully');
	}

	public function deletePlayer()
	{
		
	}

	

	public function viewPlayer($id){
		return View::make('player.playerview')
			->with('title', 'NSCL Player')
			->with('player', Player::find($id));
	}

}