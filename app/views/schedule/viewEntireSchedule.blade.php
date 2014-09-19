@extends('layouts.default')

@section('content')
	<h1>NSCL Schedule 2014-2015</h1>


	<table class = "table table-bordered table-striped table-condensed sortable">
			<thead>
			<tr>
				
				<th>Date</th>
				<th>White</th>
				<th>Black</th>
				<th>Location</th>
			
			</tr>
			</thead>
		
		<tbody>
		@foreach($schedule as $match)
			
				
				<tr>
					
					<td>{{ $match -> Date }}</td>
					<td>{{ $match -> white }}</td>
					<td>{{ $match -> black }}</td>
					<td>{{ $match -> location }}</td>
				</tr>
				
			
		@endforeach
		</tbody>

	</table>


@stop