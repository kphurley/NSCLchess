@extends('layouts.default')



@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <link href="../css/main.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	    
	<h1>{{ $team->school }} ({{ $team->league_wins }}-{{ $team->league_losses }}-{{ $team->league_draws }})</h1>

	<div class="bs-docs-section">
		<div class="row">
				<div class="col-md-8 nostyle-table-container">
 
  <div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#home" role="tab" data-toggle="tab">Roster</a></li>
      <li><a href="#profile" role="tab" data-toggle="tab">Schedule</a></li>
      <li><a href="#profile3" role="tab" data-toggle="tab">Matches</a></li>
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
							<td>{{ number_format($player -> league_pt_pct ,3)}}</td>
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
							@if ($match -> homeschool === $team->school || $match -> visitorschool === $team->school)
							<tr>
								<td>{{ link_to_route('match', 'View', array($match->id)) }}</td>
								<td>{{ $match -> homeschool }}</td>
								<td>{{ $match-> homepoints }}</td>
								<td>{{ $match -> visitorschool }}</td>
								<td>{{ $match -> visitorpoints }}</td>
							</tr>
							@endif
						@endforeach
			</table>
		</div>
						
				

					
					
      </div>
     
    </div>
  </div>
</div>
</div>
	
	
@stop