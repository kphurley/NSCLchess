@extends('layouts.default')

@section('content')
	<div class = "container">
	<h3>{{$match->season}} Season Match Results:</h3>	
	<h1>{{$match->homeschool}}: {{$match->homepoints}}, {{$match->visitorschool}}: {{$match->visitorpoints}}</h1> 
	
	<table class = "table table-striped table-bordered table-condensed">
		<tr>
			<th>Board</th>
			<th>{{$match->homeschool}}</th>
			<th>Home Score</th>
			<th>{{$match->visitorschool}}</th>
			<th>Visitor Score</th>
		</tr>

	
		<tr>
			<td>1</td>
			<td>{{ $match->homeboard1 }}</td>
			<td>{{ $match->homeboard1pts }}</td>
			<td>{{ $match->visitorboard1}}</td>
			<td>{{ $match->visitorboard1pts }}</td>
		</tr>

		<tr>
			<td>2</td>
			<td>{{ $match->homeboard2 }}</td>
			<td>{{ $match->homeboard2pts }}</td>
			<td>{{ $match->visitorboard2}}</td>
			<td>{{ $match->visitorboard2pts }}</td>
		</tr>

		<tr>
			<td>3</td>
			<td>{{ $match->homeboard3 }}</td>
			<td>{{ $match->homeboard3pts }}</td>
			<td>{{ $match->visitorboard3}}</td>
			<td>{{ $match->visitorboard3pts }}</td>
		</tr>

		<tr>
			<td>4</td>
			<td>{{ $match->homeboard4 }}</td>
			<td>{{ $match->homeboard4pts }}</td>
			<td>{{ $match->visitorboard4}}</td>
			<td>{{ $match->visitorboard4pts }}</td>
		</tr>

		<tr>
			<td>5</td>
			<td>{{ $match->homeboard5 }}</td>
			<td>{{ $match->homeboard5pts }}</td>
			<td>{{ $match->visitorboard5}}</td>
			<td>{{ $match->visitorboard5pts }}</td>
		</tr>

		<tr>
			<td>6</td>
			<td>{{ $match->homeboard6 }}</td>
			<td>{{ $match->homeboard6pts }}</td>
			<td>{{ $match->visitorboard6}}</td>
			<td>{{ $match->visitorboard6pts }}</td>
		</tr>

		<tr>
			<td>7</td>
			<td>{{ $match->homeboard7 }}</td>
			<td>{{ $match->homeboard7pts }}</td>
			<td>{{ $match->visitorboard7}}</td>
			<td>{{ $match->visitorboard7pts }}</td>
		</tr>

		<tr>
			<td>8</td>
			<td>{{ $match->homeboard8 }}</td>
			<td>{{ $match->homeboard8pts }}</td>
			<td>{{ $match->visitorboard8}}</td>
			<td>{{ $match->visitorboard8pts }}</td>
		</tr>
	

	</table>

	{{ link_to_route('matches', 'Back to match listing') }}
	
	</div>
	
@stop