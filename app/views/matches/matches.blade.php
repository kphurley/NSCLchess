@extends('layouts.default')

@section('content')
	<h1>NSCL - Match List</h1>
    <div class="row">
		<div class="col-md-8 nostyle-table-container">
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
	</div></div>
	@if(Auth::check())
        {{ link_to_route('add_match', 'Add New Match', null, array('class'=>'btn btn-large btn-primary')) }}  
                    
    @endif
@stop