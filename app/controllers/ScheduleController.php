<?php

class ScheduleController extends BaseController 
{
	public function viewCompleteSchedule()
	{
		
		$view = View::make('schedule.viewEntireSchedule')
			->with('title', 'NSCL Schedule 2014-2015')
			->with('teams', Team::all())
			->with('schedule', Schedule::all());  
			
		return $view;
	
	}

	
}