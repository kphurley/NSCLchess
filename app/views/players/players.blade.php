@extends('layouts.default')

@section('content')
	<h1>Player Statistics</h1>

	<div class="row">
				<div class="col-md-8 nostyle-table-container">

	<table class = "table table-striped table-bordered table-condensed sortable">
		<thead><tr>
			<th>Name</th>
			<th>School</th>
			<th>{{ SortableTrait::link_to_sorting_action('Grade', 'Grade') }}</th>
			<th>{{ SortableTrait::link_to_sorting_action('league_wins', 'Wins') }}</th>
			<th>{{ SortableTrait::link_to_sorting_action('league_losses', 'Losses') }}</th>
			<th>{{ SortableTrait::link_to_sorting_action('league_draws', 'Draws') }}</th>
			<th>{{ SortableTrait::link_to_sorting_action('league_points', 'Points') }}</th>
			<th>{{ SortableTrait::link_to_sorting_action('league_pt_pct', 'Pct') }}</th>
		</tr></thead>
<tbody>
	@foreach($players as $player)
		<tr>
			<td>{{ $player -> name }}</td>
			<td>{{ $player -> school }}</td>
			<td>{{ $player -> Grade }}</td>
			<td>{{ $player -> league_wins }}</td>
			<td>{{ $player -> league_losses }}</td>
			<td>{{ $player -> league_draws }}</td>
			<td>{{ $player -> league_points }}</td>
			<td>{{ number_format($player -> league_pt_pct ,3)}}</td>
		</tr>
	@endforeach
</tbody>
	</table>
</div></div>
	
	{{ $players->appends(Input::except('page'))->links() }}
	<br>

	@if(Auth::check())
        {{ link_to_route('new_player', 'Add New Player', null, array('class'=>'btn btn-large btn-primary'))  }}   
                    
    @endif
	
	
	
@stop
