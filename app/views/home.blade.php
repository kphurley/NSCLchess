@extends('layouts.default')

@section('content')
	<h1>North Suburban Chess League</h1>

	{{ HTML::image('img/lone_pawn.jpg') }}

	{{ link_to_route('players', 'NSCL Players') }} | 
	{{ link_to_route('teams', 'NSCL Teams') }} |
	{{ link_to_route('add_match', 'Input Match Results')}}
@stop