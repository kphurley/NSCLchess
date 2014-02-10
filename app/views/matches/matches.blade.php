@extends('layouts.default')

@section('content')
	<h1>Players Home Page</h1>

	<table class = "table table-striped table-bordered table-condensed">
		<tr>
			<th></th>
			<th>Home (White)</th>
			<th>H pt</th>
			<th>Visitor (Black)</th>
			<th>V pt</th>
		</tr>

	@foreach($matches as $match)
		<tr>
			<td>{{ link_to_route('match', 'View', array($match->id)) }}</td>
			<td>{{ $match -> homeschool }}</td>
			<td>{{ $match-> homepoints }}</td>
			<td>{{ $match -> visitorschool }}</td>
			<td>{{ $match -> visitorpoints }}</td>
		</tr>
	@endforeach
	</table>
	
	
@stop