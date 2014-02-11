@extends('layouts.default')

@section('content')
<div class = "container">
<h4>LOOK AT THIS CAREFULLY AND CHECK TO MAKE SURE THIS INFO IS CORRECT!</h4></div>

	<div class = "container">
	<h3>{{$seas}} Season Match Results:</h3>	
	<h1>{{$home}}: {{$homescore}}, {{$visitor}}: {{$visscore}}</h1> 
	
	<table class = "table table-striped table-bordered table-condensed">
		<tr>
			<th>Board</th>
			<th>{{$home}}</th>
			<th>Home Score</th>
			<th>{{$visitor}}</th>
			<th>Visitor Score</th>
		</tr>

		@for($i=0; $i<=7; $i++)
		<tr>
			<td>{{ $i + 1 }}</td>
			<td>{{ $homeplayers[$i] }}</td>
			<td>{{ $homeBoardWins[$i] }}</td>
			<td>{{ $visplayers[$i] }}</td>
			<td>{{ $visBoardWins[$i] }}</td>
		</tr>
		@endfor
		
	</table>

	{{ Form::open ( array('url'=>'matches/create', 'method'=>'POST')) }}

	{{ Form::hidden('home', $home) }}
	{{ Form::hidden('visitor', $visitor) }}
	{{ Form::hidden('homescore',  $homescore ) }}
	{{ Form::hidden('visscore',  $visscore) }} 
	{{ Form::hidden('seas', $seas) }}

	{{ Form::hidden('homeboard1', $homeplayers[0]) }}
	{{ Form::hidden('homeboard1pts', $homeBoardWins[0]) }}
	{{ Form::hidden('visitorboard1', $visplayers[0]) }}
	{{ Form::hidden('visitorboard1pts', $visBoardWins[0]) }}

	{{ Form::hidden('homeboard2', $homeplayers[1]) }}
	{{ Form::hidden('homeboard2pts', $homeBoardWins[1]) }}
	{{ Form::hidden('visitorboard2', $visplayers[1]) }}
	{{ Form::hidden('visitorboard2pts', $visBoardWins[1]) }}

	{{ Form::hidden('homeboard3', $homeplayers[2]) }}
	{{ Form::hidden('homeboard3pts', $homeBoardWins[2]) }}
	{{ Form::hidden('visitorboard3', $visplayers[2]) }}
	{{ Form::hidden('visitorboard3pts', $visBoardWins[2]) }}

	{{ Form::hidden('homeboard4', $homeplayers[3]) }}
	{{ Form::hidden('homeboard4pts', $homeBoardWins[3]) }}
	{{ Form::hidden('visitorboard4', $visplayers[3]) }}
	{{ Form::hidden('visitorboard4pts', $visBoardWins[3]) }}

	{{ Form::hidden('homeboard5', $homeplayers[4]) }}
	{{ Form::hidden('homeboard5pts', $homeBoardWins[4]) }}
	{{ Form::hidden('visitorboard5', $visplayers[4]) }}
	{{ Form::hidden('visitorboard5pts', $visBoardWins[4]) }}

	{{ Form::hidden('homeboard6', $homeplayers[5]) }}
	{{ Form::hidden('homeboard6pts', $homeBoardWins[5]) }}
	{{ Form::hidden('visitorboard6', $visplayers[5]) }}
	{{ Form::hidden('visitorboard6pts', $visBoardWins[5]) }}

	{{ Form::hidden('homeboard7', $homeplayers[6]) }}
	{{ Form::hidden('homeboard7pts', $homeBoardWins[6]) }}
	{{ Form::hidden('visitorboard7', $visplayers[6]) }}
	{{ Form::hidden('visitorboard7pts', $visBoardWins[6]) }}

	{{ Form::hidden('homeboard8', $homeplayers[7]) }}
	{{ Form::hidden('homeboard8pts', $homeBoardWins[7]) }}
	{{ Form::hidden('visitorboard8', $visplayers[7]) }}
	{{ Form::hidden('visitorboard8pts', $visBoardWins[7]) }}
	
	

	<p>{{ link_to_route('matches', 'Go back to match listing',null, array('class'=>'btn btn-large btn-primary')) }}</p>
	<p>{{ link_to_route('add_match', 'Go back to the add match page',null, array('class'=>'btn btn-large btn-primary')) }}</p>
	<p>{{ link_to_route('new_player', 'Did you forget to add your players?  Click here',null, array('class'=>'btn btn-large btn-primary'))}}</p>

	<p>{{ Form::submit('Looks good! Add the match', array('class'=>'btn btn-large btn-primary')) }}</p>
	{{ Form::close() }}

	
	
	</div>
	
@stop