@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

	<h1>Add New NSCL Match</h1>

	{{ Form::open ( array('url'=>'matches/add2', 'method'=>'POST')) }}

	
		{{ Form::label('home', 'Home Team:')}} 
		{{ Form::select('home', array(

			'Mundelein Carmel' => 'Mundelein Carmel',
			'Deerfield' => 'Deerfield',
			'Evanston' => 'Evanston',
			'Glenbrook North' => 'Glenbrook North',
			'Glenbrook South' => 'Glenbrook South',
			'Highland Park' => 'Highland Park',
			'Lake Forest' => 'Lake Forest',
			'Maine South' => 'Maine South',
			'Maine East' => 'Maine East',
			'Mundelein' => 'Mundelein',
			'New Trier' => 'New Trier',
			'Niles West' => 'Niles West',
			'Niles North' => 'Niles North',
			'Northridge Prep' => 'Northridge Prep',
			'Notre Dame' => 'Notre Dame',
			'Stevenson' => 'Stevenson',
			'Waukegan' => 'Waukegan'
		))}}
	

	
		{{ Form::label('visitor', 'Visiting Team:')}} 
		{{ Form::select('visitor', array(

			'Mundelein Carmel' => 'Mundelein Carmel',
			'Deerfield' => 'Deerfield',
			'Evanston' => 'Evanston',
			'Glenbrook North' => 'Glenbrook North',
			'Glenbrook South' => 'Glenbrook South',
			'Highland Park' => 'Highland Park',
			'Lake Forest' => 'Lake Forest',
			'Maine South' => 'Maine South',
			'Maine East' => 'Maine East',
			'Mundelein' => 'Mundelein',
			'New Trier' => 'New Trier',
			'Niles West' => 'Niles West',
			'Niles North' => 'Niles North',
			'Northridge Prep' => 'Northridge Prep',
			'Notre Dame' => 'Notre Dame',
			'Stevenson' => 'Stevenson',
			'Waukegan' => 'Waukegan'
		))}}

	<p>
		{{ Form::label('season', 'Season:')}}
		{{ Form::select('season', array(
			'2015-2016'=>'2015-2016')) }}
	</p>
	

	<p>
		{{ Form::submit('Proceed') }}
	</p>

	{{ Form::close() }}
@stop