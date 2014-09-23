@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

<form url="password/sendReminder" method="POST">
    <label for="email">Your email:</label>
    <input type="email" name="email">
    <input type="submit" value="Send Reminder">
</form>

@stop