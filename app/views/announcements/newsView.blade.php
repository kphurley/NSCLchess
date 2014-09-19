@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

<h1>{{ $title }}</h1>

<h6>Posted by {{ $author }}</h6>

{{ $content }}

@stop