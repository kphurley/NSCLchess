@extends('layouts.default')



@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	    
	<h1>{{ $team->school }}</h1>

	<div class="bs-docs-section">
 
  <div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#home" role="tab" data-toggle="tab">Roster</a></li>
      <li><a href="#profile" role="tab" data-toggle="tab">Schedule</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="home">
        <table class = "table table-bordered table-striped table-condensed">
						<tr>
							<th>Name</th>
							
							<th>Grade</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>Draws</th>
							<th>Points</th>
							<th>Pct of Pts Won</th>
						</tr>

					@foreach($players as $player)
						
						@if ($player -> school === $team->school)
							<td>{{ $player -> name }}</td>
							
							<td>{{ $player -> Grade }}</td>
							<td>{{ $player -> league_wins }}</td>
							<td>{{ $player -> league_losses }}</td>
							<td>{{ $player -> league_draws }}</td>
							<td>{{ $player -> league_points }}</td>
							<td>{{ $player -> league_pt_pct }}</td>
						</tr>
						@endif

					@endforeach
					</table>
      </div>
      <div class="tab-pane fade" id="profile">
        <table class = "table table-bordered table-striped table-condensed">
						<tr>
							<th>Date</th>
							
							<th>White</th>
							<th>Black</th>
							<th>Location</th>
						</tr>
						<tr>
					@foreach($schedule as $match)
						
						@if ($match -> white === $team->school || $match -> black === $team->school)
							<td>{{ $match -> Date }}</td>
							
							<td>{{ $match -> white }}</td>
							<td>{{ $match -> black }}</td>
							<td>{{ $match -> location }}</td>
							
							
						</tr>
						@endif

					@endforeach
					</table>
      </div>
     
    </div>
  </div>

	
	
@stop