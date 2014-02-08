<?php

class MatchesController extends BaseController{

	public function showMatches(){
		//TODO - return a view that lists all of the matches in a nice way
	}

	public function addNewMatch(){
		return View::make('matches.addMatch')->with('title', 'Add new NSCL match');
	}

	public function addNewMatchWithTeams(){

		$passvalues = array(0=>Input::get('home'),1=>Input::get('visitor'),2=>Input::get('season'));
		Session::flash('values',$passvalues);
		Redirect::to('matches/create');

		return View::make('matches.boardResults')
			->with('title', 'Board Results for NSCL match')
			->with('home', Input::get('home'))
			->with('visitor', Input::get('visitor'))
			->with('season', Input::get('season'));
	}

	public function createMatch(){
		//TODO - This function should grab all of the data from the match and update all
		//database tables accordingly

		$homeScore = 0.0;
		$visScore = 0.0;
		$draws = array();
		$oldinput = Session::get('values');
		

		$homeBoardScorers = Input::get('homescore');
		$visBoardScorers = Input::get('visscore');

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
		}

		//tally up home team's points
		foreach($homeBoardScorers as $hScorer){
			$homeScore +=(13.0-$hScorer);
		}

		//tally up visiting team's points
		foreach($visBoardScorers as $vScorer){
			$visScore +=(13.0-$vScorer);
		}

		
		return View::make('matches.matchview')
				->with('title', 'Board Results for NSCL match')
				->with('homeScore', $homeScore)
				->with('visScore',$visScore)
				->with('homeScorers', $homeBoardScorers)
				->with('visScorers', $visBoardScorers)
				->with('draws', $draws)
				->with('home', $oldinput[0])
				->with('visitor', $oldinput[1])
				->with('season', $oldinput[2]);
		

		//home team won
		
		//DB::table('teams')->where('school', '==', 1)ncrement('votes');

	}

	public function viewMatch($id){
		//TODO - view the match details with the given id
	}
}