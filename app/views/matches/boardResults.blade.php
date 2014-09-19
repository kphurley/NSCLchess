@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	
	<h1>{{$home}}  vs.  {{$visitor}} - {{$season}}</h1>

	<div class = "container">
		Directions:  Indicate who played what board from the dropdown list of players.
		Then indicate who won by putting a check in the box next to the player who won.
		In the case of a draw, you can either leave both boxes in a row unchecked OR
		check both boxes.  The score will be automatically tallied for you.  On the NEXT
		screen, you will be able to double-check your match result against your score sheet
		for accuracy.
	</div>

	<br>

	{{ Form::open ( array('url'=>'matches/confirm', 'method'=>'POST')) }}

	<table class ="table table-striped table-bordered table-condensed">
		<tr>
			<th>Board</th>
			<th>H</th>
			<th><left>Home Player</left></th>
			
			<th><left>Visiting Player</left></th>
			<th>V</th>
		</tr>

		{{ Form::hidden('hometeam', $home)}}
		{{ Form::hidden('visteam', $visitor)}}
		{{ Form::hidden('seas', $season)}}

		@for ($i = 1; $i <= 8; $i++)
		<tr>
			<td>{{ Form::label('board[]', $i)}} </td>
			<td>{{ Form::checkbox('homescore[]', $i) }}</td>
			<td>{{ Form::select('homeboard[]', $homeplayers) }}</td>
			
			<td>{{ Form::select('visitorboard[]', $visplayers) }}</td>
			<td>{{ Form::checkbox('visscore[]', $i) }}</td>
		</tr>
		@endfor
		
		
	
	</table>
	
	
	{{ Form::submit('Add Match') }}
	

	{{ Form::close() }}

@stop