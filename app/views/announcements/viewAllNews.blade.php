@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

@foreach($announcements as $announcement)

<h1>{{ $announcement->title }}</h1>

<h6>Posted by {{ $announcement->author }}</h6>

{{ $announcement->contents }}

<a href='#top'>Back to Top</a>

@endforeach

<?php echo $announcements->links(); ?>

@stop