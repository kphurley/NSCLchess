@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Please Login</h2>
 
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    <br>
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
 	<br>

    {{ Form::submit('Login', array('class'=>'btn btn-primary btn-lg'))}}
    <br>
     	
	{{ Form::close() }}


@stop