@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
	    
<h1>{{ $team-> school }} Coach Dashboard</h1>

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
							<th>Pct</th>
							<th></th>
							
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
							

							<td>
								<div class="dropdown">
									<button class="btn btn-primary btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown">
									    Edit
									    <span class="caret"></span>
									</button>
									  <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">

									  		
											{{ Form::open ( array('url'=>'players/edit', 'method'=>'POST', 'class'=>'form-inline')) }}
											  
											    {{ Form::hidden('id', $player->id) }}

											    <legend>Edit player:</legend>
											    
											      {{ Form::label('Fname', 'First Name:')}}
											      									        
											        {{ Form::text('firstName')}}

											        {{ Form::label('Lname', 'Last Name:')}}
											      
											        {{ Form::text('lastName')}}
											    
													<br>
													{{ Form::label('Grade', 'Grade:')}}
													{{ Form::select('Grade', array(
														9=>9,
														10=>10,
														11=>11,
														12=>12))
													}}
													<br>
													<br>

										
													{{ Form::hidden('school', $team->school) }}

												
										

													<p>
														{{ Form::submit('Edit Player') }}
													</p>

													{{ Form::close() }}

									    
									  </ul>
								</div>
							</td>

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

  <p>Points = total points won for team, Pct = percentage of points won versus possible points</p>

<!--{{ link_to_route('new_player', 'Add New Player', null, array('class'=>'btn btn-default btn-lg btn-block')) }}-->

<div class="dropdown">
  <button class="btn btn-default btn-lg btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown">
    Add New Player
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

  	<div class = "container">

  	<h5><strong>Enter your new player's information below:</strong></h5>
  	
    {{ Form::open ( array('url'=>'players/create', 'method'=>'POST', 'class'=>'form-horizontal')) }}

	<p>
		{{ Form::label('Fname', 'First Name:')}}
		{{ Form::text('firstName')}}
	</p>

	<p>
		{{ Form::label('Lname', 'Last Name:')}}
		{{ Form::text('lastName')}}
	</p>


	<p>
		{{ Form::label('Grade', 'Grade:')}}
		{{ Form::select('Grade', array(
			9=>9,
			10=>10,
			11=>11,
			12=>12))
		}}
	</p>

	
		{{ Form::hidden('school', $team->school) }}

			
	

	<p>
		{{ Form::submit('Add Player') }}
	</p>

	{{ Form::close() }}

    </div>
  </ul>
</div>
<br>

{{ link_to_route('add_match', 'Add New Match Result', null, array('class'=>'btn btn-default btn-lg btn-block')) }}
{{ link_to_route('add_announcement', 'Add New Announcement', null, array('class'=>'btn btn-default btn-lg btn-block')) }}
{{ HTML::link('Notation_Sheets_NSCL.pdf', 'View/Print Notation Sheet', array('class'=>'btn btn-default btn-lg btn-block')) }}
{{ HTML::link('SCORESHT.pdf', 'View/Print Match Score Sheet', array('class'=>'btn btn-default btn-lg btn-block')) }}
{{ HTML::link('https://docs.google.com/a/maine207.org/spreadsheets/d/1OQfJOy33LEbuNfqAli9vHzYucKk22pD9IlvYurg-SRo/edit?usp=sharing', 'View/Print Coaches Contact Info', array('class'=>'btn btn-default btn-lg btn-block')) }}


@stop