@extends('layouts.default')

@section('content')
	<h1>NSCL Standings and Crosstable</h1>

	<div class="row">
		<div class="col-md-6 nostyle-table-container">
	
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
</div></div>



	<div class="row">
		<div class="col-md-6 nostyle-table-container">
	
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

</div></div>

@stop