<?php

class MatchesController extends BaseController{

	public function showMatches(){
		
		$matches = Match::all();
		$view = View::make('matches.matches')
			->with('title', 'NSCL Matches')
			->with('matches', $matches);
		return $view;
	}

	public function addNewMatch(){
		return View::make('matches.addMatch')->with('title', 'Add new NSCL match');
	}

	public function addNewMatchWithTeams(){

		$passvalues = array(0=>Input::get('home'),1=>Input::get('visitor'),2=>Input::get('season'));
		Session::flash('values',$passvalues);
		

		$home = Input::get('home');
		$visitor = Input::get('visitor');
		$homePlayers = Player::where('school','=', $home)->orwhere('name','=','forfeit')->lists('name','id');
		$visPlayers = Player::where('school','=', $visitor)->orwhere('name','=','forfeit')->lists('name','id');

		return View::make('matches.boardResults')
			->with('title', 'Board Results for NSCL match')
			->with('home', Input::get('home'))
			->with('visitor', Input::get('visitor'))
			->with('season', Input::get('season'))
			->with('homeplayers', $homePlayers)
			->with('visplayers', $visPlayers);
	}

	public function confirmAddMatch(){
		
		/* This function computes the final scores of the match, and updates all team and player data in the DB */

		//-------------Local variable declarations--------------------------------
		$homeScore = Input::get('homescore');
		$visScore = Input::get('visscore');
		$draws = array();
		$home = Input::get('home');
		$visitor = Input::get('visitor');
		$homeBoardScorers = Input::get('homeBoardScorers');
		$visBoardScorers = Input::get('visBoardScorers');
		
		//-------------------------------------------------------------------------

			
		// code for color tracking 
		
		$homeColors = array(0=> 'white', 1=> 'black', 2=> 'white', 3=> 'black',
		 					4=> 'black', 5=> 'white', 6=> 'black', 7=> 'white');

		$visColors = array(0=> 'black', 1=> 'white', 2=> 'black', 3=> 'white',
		 					4=> 'white', 5=> 'black', 6=> 'white', 7=> 'black');

		

		//---------------------Create a new entry in Match DB----------------------

		Match::create(array(
		'homeschool'=>$home,
		'homepoints'=>$homeScore,
		'visitorschool'=>$visitor,
		'visitorpoints'=>$visScore,
		'homeboard1'=>Input::get('homeboard1'),
		'homeboard1pts'=>Input::get('homeboard1pts'),
		'visitorboard1'=>Input::get('visitorboard1'),
		'visitorboard1pts'=>Input::get('visitorboard1pts'),
		'homeboard2'=>Input::get('homeboard2'),
		'homeboard2pts'=>Input::get('homeboard2pts'),
		'visitorboard2'=>Input::get('visitorboard2'),
		'visitorboard2pts'=>Input::get('visitorboard2pts'),
		'homeboard3'=>Input::get('homeboard3'),
		'homeboard3pts'=>Input::get('homeboard3pts'),
		'visitorboard3'=>Input::get('visitorboard3'),
		'visitorboard3pts'=>Input::get('visitorboard3pts'),
		'homeboard4'=>Input::get('homeboard4'),
		'homeboard4pts'=>Input::get('homeboard4pts'),
		'visitorboard4'=>Input::get('visitorboard4'),
		'visitorboard4pts'=>Input::get('visitorboard4pts'),
		'homeboard5'=>Input::get('homeboard5'),
		'homeboard5pts'=>Input::get('homeboard5pts'),
		'visitorboard5'=>Input::get('visitorboard5'),
		'visitorboard5pts'=>Input::get('visitorboard5pts'),
		'homeboard6'=>Input::get('homeboard6'),
		'homeboard6pts'=>Input::get('homeboard6pts'),
		'visitorboard6'=>Input::get('visitorboard6'),
		'visitorboard6pts'=>Input::get('visitorboard6pts'),
		'homeboard7'=>Input::get('homeboard7'),
		'homeboard7pts'=>Input::get('homeboard7pts'),
		'visitorboard7'=>Input::get('visitorboard7'),
		'visitorboard7pts'=>Input::get('visitorboard7pts'),
		'homeboard8'=>Input::get('homeboard8'),
		'homeboard8pts'=>Input::get('homeboard8pts'),
		'visitorboard8'=>Input::get('visitorboard8'),
		'visitorboard8pts'=>Input::get('visitorboard8pts'),
		'season'=>Input::get('seas')
		));
		//---------------------------------------------------------------------------

		//---------------------Individual results and DB updating logic---------------

		//update Team stats - working

		DB::table('teams')->where('school',$home)
						->increment('league_points',$homeScore);
		DB::table('teams')->where('school',$visitor)
						->increment('league_points',$visScore);

		if($homeScore > $visScore){
			DB::table('teams')->where('school',$home)
						->increment('league_wins');
			DB::table('teams')->where('school',$visitor)
						->increment('league_losses');
		}

		else if($homeScore < $visScore){
			DB::table('teams')->where('school',$home)
						->increment('league_losses');
			DB::table('teams')->where('school',$visitor)
						->increment('league_wins');
		}

		else{
			DB::table('teams')->where('school',$home)
						->increment('league_draws');
			DB::table('teams')->where('school',$visitor)
						->increment('league_draws');
		}

		
		//update player stats

		//foreach player in $homeplayers - update win,loss, draw, add points

		$homeplayers = array(0=>Input::get('homeboard1'),
							1=>Input::get('homeboard2'),
							2=>Input::get('homeboard3'),
							3=>Input::get('homeboard4'),
							4=>Input::get('homeboard5'),
							5=>Input::get('homeboard6'),
							6=>Input::get('homeboard7'),
							7=>Input::get('homeboard8'));

		$visplayers = array(0=>Input::get('visitorboard1'),
							1=>Input::get('visitorboard2'),
							2=>Input::get('visitorboard3'),
							3=>Input::get('visitorboard4'),
							4=>Input::get('visitorboard5'),
							5=>Input::get('visitorboard6'),
							6=>Input::get('visitorboard7'),
							7=>Input::get('visitorboard8'));

		$homeBoardWins = array(0=>Input::get('homeboard1pts'),
							1=>Input::get('homeboard2pts'),
							2=>Input::get('homeboard3pts'),
							3=>Input::get('homeboard4pts'),
							4=>Input::get('homeboard5pts'),
							5=>Input::get('homeboard6pts'),
							6=>Input::get('homeboard7pts'),
							7=>Input::get('homeboard8pts'));

		$visBoardWins = array(0=>Input::get('visitorboard1pts'),
							1=>Input::get('visitorboard2pts'),
							2=>Input::get('visitorboard3pts'),
							3=>Input::get('visitorboard4pts'),
							4=>Input::get('visitorboard5pts'),
							5=>Input::get('visitorboard6pts'),
							6=>Input::get('visitorboard7pts'),
							7=>Input::get('visitorboard8pts'));

		$i = 0;
		foreach($homeplayers as $homeplayer){
			$boardScore = 12.0-$i;
			$boardColor = $homeColors[$i];

			// Update point entries for home player
			DB::table('players')->where('name',$homeplayer)
						->increment('league_points', $homeBoardWins[$i]);
			DB::table('players')->where('name',$homeplayer)
						->increment('league_pt_poss', $boardScore);

			$ptearned = DB::table('players')->where('name',$homeplayer)->pluck('league_points');
			$ptposs = DB::table('players')->where('name',$homeplayer)->pluck('league_pt_poss');

			DB::table('players')->where('name',$homeplayer)
						->update(array('league_pt_pct'=>($ptearned/$ptposs)));


			if($homeBoardWins[$i]==$boardScore){  //this player won
				DB::table('players')->where('name',$homeplayer)
						->increment('league_wins');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$homeplayer)
						->increment('white_wins');
				} 
				else{
					DB::table('players')->where('name',$homeplayer)
						->increment('black_wins');
				}

			}
			else if ($homeBoardWins[$i]==0.0){ //this player lost
				DB::table('players')->where('name',$homeplayer)
						->increment('league_losses');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$homeplayer)
						->increment('white_losses');
				} 
				else{
					DB::table('players')->where('name',$homeplayer)
						->increment('black_losses');
				}
			}
			else{  //draw
				DB::table('players')->where('name',$homeplayer)
						->increment('league_draws');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$homeplayer)
						->increment('white_draws');
				} 
				else{
					DB::table('players')->where('name',$homeplayer)
						->increment('black_draws');
				}
			}

			$i++;
			
		}

		//foreach player in $visplayers - update win,loss, draw, add points
		$i = 0;
		foreach($visplayers as $visplayer){
			$boardScore = 12.0-$i;
			$boardColor = $homeColors[$i];

			// Update point entries for home player
			DB::table('players')->where('name',$visplayer)
						->increment('league_points', $visBoardWins[$i]);
			DB::table('players')->where('name',$visplayer)
						->increment('league_pt_poss', $boardScore);

			$ptearned = DB::table('players')->where('name',$visplayer)->pluck('league_points');
			$ptposs = DB::table('players')->where('name',$visplayer)->pluck('league_pt_poss');

			DB::table('players')->where('name',$visplayer)
						->update(array('league_pt_pct'=>($ptearned/$ptposs)));

			
			if($visBoardWins[$i]==$boardScore){  //this player won
				DB::table('players')->where('name',$visplayer)
						->increment('league_wins');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$visplayer)
						->increment('white_wins');
				} 
				else{
					DB::table('players')->where('name',$visplayer)
						->increment('black_wins');
				}

			}
			else if ($visBoardWins[$i]==0.0){ //this player lost
				DB::table('players')->where('name',$visplayer)
						->increment('league_losses');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$visplayer)
						->increment('white_losses');
				} 
				else{
					DB::table('players')->where('name',$visplayer)
						->increment('black_losses');
				}
			}
			else{  //draw
				DB::table('players')->where('name',$visplayer)
						->increment('league_draws');
				if($boardColor == 'white'){
					DB::table('players')->where('name',$visplayer)
						->increment('white_draws');
				} 
				else{
					DB::table('players')->where('name',$visplayer)
						->increment('black_draws');
				}
			}

			$i++;
			
		}
		//redirect user to match list page with confirmation message

		return Redirect::route('matches')
			->with('message', 'Match created successfully');
		

		
	}

	public function viewMatch($id){
		return View::make('matches.matchview')
			->with('title', 'NSCL match')
			->with('match', Match::find($id));
	}

	public function createMatch(){

		$homeBoardScorers = Input::get('homescore');
		$visBoardScorers = Input::get('visscore');
		$draws = array();
		$homeScore = 0.0;
		$visScore = 0.0;
		$homeplayers = array();
		$visplayers = array();
		$homeboard = Input::get('homeboard');
		$visboard = Input::get('visitorboard');
		$homeBoardWins = array();
		$visBoardWins = array();
		//-------------------------------------------------------------------------

		//----------------------Populate array of players-------------------------

		for($i = 0; $i<=7; $i++){
			$homeplayers[$i] = DB::table('players')->where('id',$homeboard[$i])->pluck('name');
			$visplayers[$i] = DB::table('players')->where('id',$visboard[$i])->pluck('name');
		}
		
		//------------------------Populate array of board scores-------------------
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

		//Handle draws, and then compute board score for each board
		$i = 0;
		for($i = 0; $i <8; $i++){
			if($homeBoardWins[$i]==$visBoardWins[$i]){
				$homeBoardWins[$i] = 0.5;
				$visBoardWins[$i] = 0.5;
			}
			$homeBoardWins[$i] = $homeBoardWins[$i]*(13.0-($i+1));
			$visBoardWins[$i] = $visBoardWins[$i]*(13.0-($i+1));
		}


		// //this code handles draws
		// foreach($homeBoardScorers as $hScorer){
		// 	foreach($visBoardScorers as $vScorer){
		// 		if($hScorer == $vScorer){
		// 			$homeScore += (13.0-$hScorer)/2;
		// 			$visScore += (13.0-$vScorer)/2;
		// 			$draws[]=$hScorer;
		// 			unset($homeBoardScorers[array_search($hScorer,$homeBoardScorers)]);
		// 			unset($visBoardScorers[array_search($vScorer,$visBoardScorers)]);
		// 		}
					
		// 	}
		// } //end draw code

		//tally up home team's points
		foreach($homeBoardWins as $hwins){
			$homeScore += $hwins;
		}

		//tally up visiting team's points
		foreach($visBoardWins as $vwins){
			$visScore += $vwins;
		}
		return View::make('matches.confirmAddMatch')
			->with('title', 'Confirm Match Creation')
			->with('homeplayers',$homeplayers)

			->with('visplayers', $visplayers)
			->with('home' , Input::get('hometeam'))
			->with('visitor' , Input::get('visteam'))
			//->with('homeBoardScorers' , Input::get('homescore'))
			//->with('visBoardScorers' , Input::get('visscore'))
			->with('homeBoardWins' , $homeBoardWins)
			->with('visBoardWins' , $visBoardWins)
			->with('seas' , Input::get('seas'))
			->with('homescore' , $homeScore)
			->with('visscore' , $visScore);

	}
}