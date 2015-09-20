@extends('layouts.default')

@section('content')

	<div class="container">
		
			<div class="well">
				<!-- Most recent news section -->

					<h1>{{ $mostRecentNews-> title }}</h1>
					<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posted by {{$mostRecentNews -> author}}</h6>
					<br>
					{{ $mostRecentNews-> contents }}
  
			</div>
				
			<div class="panel panel-primary">

				<div class="panel-heading">
					<h3 class="panel-title">Most Recent News</h3>
				</div>

  				<div class="panel-body">
    				<!-- Other recent news link area -->
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

        	
  				</div>
			</div>	<!--end of first row/news area-->
        		
        						
		
			<div class="panel panel-primary">

				<div class="panel-heading">
					<h3 class="panel-title">League Statistics and Results</h3>
				</div>

  				<div class="panel-body">
				
		
			
				<div class="bs-docs-section">
 
				  <div class="bs-example bs-example-tabs">
				    <ul id="myTab" class="nav nav-tabs" role="tablist">
				      <li class="active"><a href="#home" role="tab" data-toggle="tab">North Standings</a></li>
				      <li><a href="#profile" role="tab" data-toggle="tab">South Standings</a></li>
				      <li><a href="#profile1" role="tab" data-toggle="tab">Top Players</a></li>
				      <li><a href="#profile3" role="tab" data-toggle="tab">Recent Results</a></li>
				    </ul>
			    <div id="myTabContent" class="tab-content">
			      <div class="tab-pane fade in active" id="home">
			        <table class = "table table-bordered table-striped table-hover sortable">
								<thead>
								<tr class="info">
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
        <table class = "table table-bordered table-striped table-hover sortable">
					<thead>
					<tr class="info">
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
	      			
					<table class = "table table-striped table-bordered table-hover sortable">
						<thead>
							<tr class="info">
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

					{{ link_to_route('players', 'More Player Statistics', null, array('class'=>'btn btn-primary')) }}

					
					
			</div>

      

      <div class="tab-pane fade" id="profile3">
      		<table class = "table table-striped table-bordered table-hover">
							<tr class="info">
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

						{{ link_to_route('matches', 'More Match Results', null, array('class'=>'btn btn-primary')) }}

					</div>
     
    </div>
  </div></div></div></div>


  </div>

  <h6> Website design courtesy of Bootstrap, Bootswatch-Flatly, Laravel, and Kevin Hurley </h6>

	</div>	
		
@stop