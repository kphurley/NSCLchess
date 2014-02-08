@extends('layouts.default')



@section('content')
	<div class = "container">
	<h3>{{$season}} Season Match Results:</h3>	
	<h1>{{$home}}: {{$homeScore}}, {{$visitor}}: {{$visScore}}</h1> 

	

	{{$home}} boards won:<br/>
	@foreach($homeScorers as $hs)
		{{$hs}}<br/>
	@endforeach
	<br/>
	{{$visitor}} boards won:<br/>
	@foreach($visScorers as $vs)
		{{$vs}}<br/>
	@endforeach
	<br/>
	Draws on:<br/>
	@foreach($draws as $d)
		{{$d}}<br/>
	@endforeach

	Updated:  2/8/2014
	</div>

	
@stop