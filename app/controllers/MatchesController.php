<?php

class MatchesController extends BaseController{

	public function showMatches(){
		$view = View::make('matches.matches')
			->with('title', 'NSCL Matches')
			->with('matches', Match::all());
		return $view;
	}

	public function addNewMatch(){
		return View::make('matches.addMatch')->with('title', 'Add new NSCL match');
	}

	public function addNewMatchWithTeams(){

		$passvalues = array(0=>Input::get('home'),1=>Input::get('visitor'),2=>Input::get('season'));
		Session::flash('values',$passvalues);
		Redirect::to('matches/create');

		$home = Input::get('home');
		$visitor = Input::get('visitor');
		$homePlayers = Player::where('school','=', $home)->lists('name','id');
		$visPlayers = Player::where('school','=', $visitor)->lists('name','id');
		

		return View::make('matches.boardResults')
			->with('title', 'Board Results for NSCL match')
			->with('home', Input::get('home'))
			->with('visitor', Input::get('visitor'))
			->with('season', Input::get('season'))
			->with('homeplayers', $homePlayers)
			->with('visplayers', $visPlayers);
	}

	public function createMatch(){
		
		/* This function is now able to compute the final score and is passing 
		who won what board to the view.  Still need to add code to update the
		match database and print a table with the results of the game */

		$homeScore = 0.0;
		$visScore = 0.0;
		$draws = array();
		$oldinput = Session::get('values');  //This gets the schools and season from previous form

		
		$homeplayers=Input::get('homeboard');
		$visplayers=Input::get('visitorboard');


		$home = $oldinput[0];
		$visitor = $oldinput[1];

		


		$homeBoardScorers = Input::get('homescore');
		$visBoardScorers = Input::get('visscore');

		$homeBoardWins = array();
		$visBoardWins = array();

		$i = 0;
		for($i = 0; $i <8; $i++){
			$homeBoardWins[$i] = 0.0;
			foreach($homeBoardScorers as $hScorer){
				if(($hScorer-1) == $i) {
					$homeBoardWins[$i] = 1.0;					
				}
			}				
		}

		$i = 0;
		for($i = 0; $i <8; $i++){
			$visBoardWins[$i] = 0.0;
			foreach($visBoardScorers as $vScorer){
				if(($vScorer-1) == $i) {
					$visBoardWins[$i] = 1.0;					
				}
			}				
		}

		//first scan for draws, change accordingly, and then compute board score for each board
		$i = 0;
		for($i = 0; $i <8; $i++){
			if($homeBoardWins[$i]==$visBoardWins[$i]){
				$homeBoardWins[$i] = 0.5;
				$visBoardWins[$i] = 0.5;
			}
			$homeBoardWins[$i] = $homeBoardWins[$i]*(13.0-($i+1));
			$visBoardWins[$i] = $visBoardWins[$i]*(13.0-($i+1));
		}
			


		// Individual results and DB updating logic

		$i = 1;
		$homeColors = array(1=> 'white', 2=> 'black', 3=> 'white', 4=> 'black',
							5=> 'black', 6=> 'white', 7=> 'black', 8=> 'white');

		$visColors = array(1=> 'black', 2=> 'white', 3=> 'black', 4=> 'white',
							5=> 'white', 6=> 'black', 7=> 'white', 8=> 'black');

		
		//Team Scores Logic

		//this code handles draws
		foreach($homeBoardScorers as $hScorer){
			foreach($visBoardScorers as $vScorer){
				if($hScorer == $vScorer){
					$homeScore += (13.0-$hScorer)/2;
					$visScore += (13.0-$vScorer)/2;
					$draws[]=$hScorer;
					unset($homeBoardScorers[array_search($hScorer,$homeBoardScorers)]);
					unset($visBoardScorers[array_search($vScorer,$visBoardScorers)]);
				}
					
			}
		} //end draw code

		//tally up home team's points
		foreach($homeBoardScorers as $hScorer){
			$homeScore +=(13.0-$hScorer);
		}

		//tally up visiting team's points
		foreach($visBoardScorers as $vScorer){
			$visScore +=(13.0-$vScorer);
		}

		//end Team Score Logic

		//create a new entry in Match DB

		Match::create(array(
		'homeschool'=>$oldinput[0],
		'homepoints'=>$homeScore,
		'visitorschool'=>$oldinput[1],
		'visitorpoints'=>$visScore,
		'homeboard1'=>DB::table('players')->where('id',$homeplayers[0])->pluck('name'),
		'homeboard1pts'=>$homeBoardWins[0],
		'visitorboard1'=>DB::table('players')->where('id',$visplayers[0])->pluck('name'),
		'visitorboard1pts'=>$visBoardWins[0],
		'homeboard2'=>DB::table('players')->where('id',$homeplayers[1])->pluck('name'),
		'homeboard2pts'=>$homeBoardWins[1],
		'visitorboard2'=>DB::table('players')->where('id',$visplayers[1])->pluck('name'),
		'visitorboard2pts'=>$visBoardWins[1],
		'homeboard3'=>DB::table('players')->where('id',$homeplayers[2])->pluck('name'),
		'homeboard3pts'=>$homeBoardWins[2],
		'visitorboard3'=>DB::table('players')->where('id',$visplayers[2])->pluck('name'),
		'visitorboard3pts'=>$visBoardWins[2],
		'homeboard4'=>DB::table('players')->where('id',$homeplayers[3])->pluck('name'),
		'homeboard4pts'=>$homeBoardWins[3],
		'visitorboard4'=>DB::table('players')->where('id',$visplayers[3])->pluck('name'),
		'visitorboard4pts'=>$visBoardWins[3],
		'homeboard5'=>DB::table('players')->where('id',$homeplayers[4])->pluck('name'),
		'homeboard5pts'=>$homeBoardWins[4],
		'visitorboard5'=>DB::table('players')->where('id',$visplayers[4])->pluck('name'),
		'visitorboard5pts'=>$visBoardWins[4],
		'homeboard6'=>DB::table('players')->where('id',$homeplayers[5])->pluck('name'),
		'homeboard6pts'=>$homeBoardWins[5],
		'visitorboard6'=>DB::table('players')->where('id',$visplayers[5])->pluck('name'),
		'visitorboard6pts'=>$visBoardWins[5],
		'homeboard7'=>DB::table('players')->where('id',$homeplayers[6])->pluck('name'),
		'homeboard7pts'=>$homeBoardWins[6],
		'visitorboard7'=>DB::table('players')->where('id',$visplayers[6])->pluck('name'),
		'visitorboard7pts'=>$visBoardWins[6],
		'homeboard8'=>DB::table('players')->where('id',$homeplayers[7])->pluck('name'),
		'homeboard8pts'=>$homeBoardWins[7],
		'visitorboard8'=>DB::table('players')->where('id',$visplayers[7])->pluck('name'),
		'visitorboard8pts'=>$visBoardWins[7],
		'season'=>$oldinput[2]
		));

		//update Team stats
		

		//update player stats

		return Redirect::route('matches')
			->with('message', 'Match created successfully');
		

		
	}

	public function viewMatch($id){
		return View::make('matches.matchview')
			->with('title', 'NSCL match')
			->with('match', Match::find($id));
	}
}