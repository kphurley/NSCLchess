@extends('layouts.default')

@section('content')

	<h1>North Suburban Chess League</h1>	

	<div class="container">
		
			<div class="row">
				<div class="col-md-6 nostyle-table-container">
			
						
				<h1>{{ $mostRecentNews-> title }}</h1>
				<h6>Posted by {{$mostRecentNews -> author}}</h6>
				<br>
				{{ $mostRecentNews-> contents }}

				<h4>More Recent News:</h4>

				<?php $i = 1 ?>

				@foreach($announcements as $news)
					
					@if($i != 1)
					<?php
						
   						$str1 = 'announcement/';
   						$str2 = $news->id;
   						
 
   						$full = $str1.$str2;
 
   						
						?>
					
						<ul><?php Echo "<a href=$full>$news->title</a>" ?></ul>	

					@endif

					<?php $i++ ?>				
				
				@endforeach

				<ul>{{ link_to_route('view_all_announcements', 'View All League News') }}</ul>
			
			</div></div>
						
		
			<div class="row">
				<div class="col-md-6 nostyle-table-container">
		
			
				<div class="bs-docs-section">
 
				  <div class="bs-example bs-example-tabs">
				    <ul id="myTab" class="nav nav-tabs" role="tablist">
				      <li class="active"><a href="#home" role="tab" data-toggle="tab">North Standings</a></li>
				      <li><a href="#profile" role="tab" data-toggle="tab">South Standings</a></li>
				      <li><a href="#profile1" role="tab" data-toggle="tab">Top Players</a></li>
				      <li><a href="#profile2" role="tab" data-toggle="tab">Schedule</a></li>
				      <li><a href="#profile3" role="tab" data-toggle="tab">Recent Results</a></li>
				    </ul>
			    <div id="myTabContent" class="tab-content">
			      <div class="tab-pane fade in active" id="home">
			        <table class = "table table-bordered table-striped table-condensed sortable">
								<thead>
								<tr>
									<th>North Division</th>
									<th>{{ SortableTrait::link_to_sorting_action('league_wins', 'Wins') }}</th>
									<th>{{ SortableTrait::link_to_sorting_action('league_losses', 'Losses') }}</th>
									<th>{{ SortableTrait::link_to_sorting_action('league_draws', 'Draws') }}</th>
									<th>{{ SortableTrait::link_to_sorting_action('win_pct', 'Win Pct') }}</th>
									<th>{{ SortableTrait::link_to_sorting_action('league_points', 'Points') }}</th>
								
								</tr>
								</thead>
				
				<tbody>
				@foreach($teams as $team)
					
						@if ($team -> division === 'North')
							<tr>
								<td>{{ link_to_route('team', $team -> school, array($team->id)) }}</td>
								<td>{{ $team -> league_wins }}</td>
								<td>{{ $team -> league_losses }}</td>
								<td>{{ $team -> league_draws }}</td>
								<td>{{ $team -> win_pct }}</td>
								<td>{{ $team -> league_points }}</td>
							</tr>
						@endif
					
				@endforeach
				</tbody>

				</table>
      </div>
      <div class="tab-pane fade" id="profile">
        <table class = "table table-bordered table-striped table-condensed sortable">
					<thead>
					<tr>
						<th>South Division</th>
						<th>{{ SortableTrait::link_to_sorting_action('league_wins', 'Wins') }}</th>
						<th>{{ SortableTrait::link_to_sorting_action('league_losses', 'Losses') }}</th>
						<th>{{ SortableTrait::link_to_sorting_action('league_draws', 'Draws') }}</th>
						<th>{{ SortableTrait::link_to_sorting_action('win_pct', 'Win Pct') }}</th>
						<th>{{ SortableTrait::link_to_sorting_action('league_points', 'Points') }}</th>
					</tr>
				</thead>

				<tbody>
				@foreach($teams as $team)
					
						@if ($team -> division === 'South')
							<tr>
								<td>{{ link_to_route('team', $team -> school, array($team->id)) }}</td>
								<td>{{ $team -> league_wins }}</td>
								<td>{{ $team -> league_losses }}</td>
								<td>{{ $team -> league_draws }}</td>
								<td>{{ $team -> win_pct }}</td>
								<td>{{ $team -> league_points }}</td>
							</tr>
						@endif
					
				@endforeach
				</tbody>
				</table>
      </div>

      <div class="tab-pane fade" id="profile1">
	      			
					<table class = "table table-striped table-bordered table-condensed sortable">
						<thead><tr>
							<th>Name</th>
							<th>School</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>Draws</th>
							<th>Points</th>
							<th>Pct</th>
						</tr></thead>
				<tbody>
					@foreach($players as $player)
						<tr>
							<td>{{ $player -> name }}</td>
							<td>{{ $player -> school }}</td>
							<td>{{ $player -> league_wins }}</td>
							<td>{{ $player -> league_losses }}</td>
							<td>{{ $player -> league_draws }}</td>
							<td>{{ $player -> league_points }}</td>
							<td>{{ number_format($player -> league_pt_pct ,3)}}</td>
						</tr>
					@endforeach
				</tbody>
					</table>

					
					
			</div>

      <div class="tab-pane fade" id="profile2">

      			<table class = "table table-bordered table-striped table-condensed sortable">
								<thead>
								<tr>
									
									<th>Date</th>
									<th>White</th>
									<th>Black</th>
									<th>Location</th>
								
								</tr>
								</thead>
							
							<tbody>
							@foreach($schedule as $match)
								
									
									<tr>
										
										<td>{{ $match -> Date }}</td>
										<td>{{ $match -> white }}</td>
										<td>{{ $match -> black }}</td>
										<td>{{ $match -> location }}</td>
									</tr>
									
								
							@endforeach
							</tbody>

					</table>

					<?php echo $schedule->links(); ?>

				</div>  

      <div class="tab-pane fade" id="profile3">
      		<table class = "table table-striped table-bordered table-condensed">
							<tr>
								<th></th>
								<th>Home (White)</th>
								<th>H pt</th>
								<th>Visitor (Black)</th>
								<th>V pt</th>
							</tr>

						@foreach($matches as $match)
							<tr>
								<td>{{ link_to_route('match', 'View', array($match->id)) }}</td>
								<td>{{ $match -> homeschool }}</td>
								<td>{{ $match-> homepoints }}</td>
								<td>{{ $match -> visitorschool }}</td>
								<td>{{ $match -> visitorpoints }}</td>
							</tr>
						@endforeach
						</table>
					</div>
     
    </div>
  </div></div></div></div>

  <h6> Website design courtesy of Bootstrap, Bootswatch-Flatly, Laravel, and Kevin Hurley </h6>

		
		
@stop