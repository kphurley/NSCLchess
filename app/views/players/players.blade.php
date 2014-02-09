@extends('layouts.default')

@section('content')
	<h1>Players Home Page</h1>

	<table class = "table table-striped table-bordered table-condensed">
		<tr>
			<th>Name</th>
			<th>School</th>
			<th>Grade</th>
			<th>Wins</th>
			<th>Losses</th>
			<th>Draws</th>
			<th>Points</th>
			<th>Pct</th>
		</tr>

	@foreach($players as $player)
		<tr>
			<td>{{ $player -> name }}</td>
			<td>{{ $player -> school }}</td>
			<td>{{ $player -> Grade }}</td>
			<td>{{ $player -> league_wins }}</td>
			<td>{{ $player -> league_losses }}</td>
			<td>{{ $player -> league_draws }}</td>
			<td>{{ $player -> league_points }}</td>
			<td>{{ $player -> league_pt_pct }}</td>
		</tr>
	@endforeach
	</table>
	
	<p>{{ link_to_route('new_player', 'Add New Player') }}</p>
@stop
