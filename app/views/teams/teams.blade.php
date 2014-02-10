@extends('layouts.default')

@section('content')
	<h1>NSCL Standings and Crosstable</h1>

	
	<table class = "table table-bordered table-striped table-condensed sortable">
		<thead>
		<tr>
			<th>North Division</th>
			<th>Wins</th>
			<th>Losses</th>
			<th>Draws</th>
			<th>Points</th>
		
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
					<td>{{ $team -> league_points }}</td>
				</tr>
			@endif
		
	@endforeach
	</tbody>

	</table>

	
	<table class = "table table-bordered table-striped table-condensed sortable">
		<thead>
		<tr>
			<th>South Division</th>
			<th>Wins</th>
			<th>Losses</th>
			<th>Draws</th>
			<th>Points</th>
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
					<td>{{ $team -> league_points }}</td>
				</tr>
			@endif
		
	@endforeach
	</tbody>
	</table>


@stop