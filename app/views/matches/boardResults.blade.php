@extends('layouts.default')

@section('content')
	
	<h1>{{$home}}  vs.  {{$visitor}} - {{$season}}</h1>



	{{ Form::open ( array('url'=>'matches/create', 'method'=>'POST')) }}

	<table class ="table table-striped table-bordered table-condensed">
		<tr>
			<th>Board</th>
			<th>H</th>
			<th><left>Home Player</left></th>
			
			<th><left>Visiting Player</left></th>
			<th>V</th>
		</tr>



		@for ($i = 1; $i <= 8; $i++)
		<tr>
			<td>{{ Form::label('board[]', $i)}} </td>
			<td>{{ Form::checkbox('homescore[]', $i) }}</td>
			<td>{{ Form::select('homeboard[]', Player::where('school','=', $home)->lists('name')) }}</td>
			
			<td>{{ Form::select('visitorboard[]', Player::where('school','=', $visitor)->lists('name')) }}</td>
			<td>{{ Form::checkbox('visscore[]', $i) }}</td>
		</tr>
		@endfor
		
		
	
	</table>
	
	
	{{ Form::submit('Add Match') }}
	

	{{ Form::close() }}

@stop