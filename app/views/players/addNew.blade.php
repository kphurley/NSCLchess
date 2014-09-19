@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	
	<h1>Add New NSCL Player</h1>

	{{ Form::open ( array('url'=>'players/create', 'method'=>'POST')) }}

	<p>
		{{ Form::label('Fname', 'First Name:')}}
		{{ Form::text('firstName')}}
	</p>

	<p>
		{{ Form::label('Lname', 'Last Name:')}}
		{{ Form::text('lastName')}}
	</p>


	<p>
		{{ Form::label('Grade', 'Grade:')}}
		{{ Form::select('Grade', array(
			9=>9,
			10=>10,
			11=>11,
			12=>12))
		}}
	</p>

	<p>
		{{ Form::label('school', 'School:')}}
		{{ Form::select('school', array(

			'Mundelein Carmel' => 'Mundelein Carmel',
			'Deerfield' => 'Deerfield',
			'Evanston' => 'Evanston',
			'Glenbrook North' => 'Glenbrook North',
			'Glenbrook South' => 'Glenbrook South',
			'Highland Park' => 'Highland Park',
			'Lake Forest' => 'Lake Forest',
			'Maine South' => 'Maine South',
			'Maine West' => 'Maine West',
			'Mundelein' => 'Mundelein',
			'New Trier' => 'New Trier',
			'Niles West' => 'Niles West',
			'Niles North' => 'Niles North',
			'Northridge Prep' => 'Northridge Prep',
			'Notre Dame' => 'Notre Dame',
			'Stevenson' => 'Stevenson',
			'Waukegan' => 'Waukegan',
		))}}
	</p>

	<p>
		{{ Form::submit('Add Player') }}
	</p>

	{{ Form::close() }}
@stop

