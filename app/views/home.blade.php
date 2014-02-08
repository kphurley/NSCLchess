@extends('layouts.default')

@section('content')
	<h1>Welcome to the North Suburban Chess League Home Page</h1>

	{{ link_to_route('players', 'NSCL Players') }} <br />
	{{ link_to_route('teams', 'NSCL Teams') }} <br />
	{{ link_to_route('add_match', 'Input Match Results')}}
@stop