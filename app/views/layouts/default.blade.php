<!DOCTYPE html>

<html lang="en">
<head>
	<title>{{$title}}</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::style('css/bootstrap.css') }}
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>
<div class = "container">
<nav class = "navbar navbar-default" role="navigation">	




	<ul class = "nav navbar-nav">
		
		<li>{{ link_to_route('home', 'Home') }}</li>
		<li>{{ link_to_route('players', 'Players') }}</li>
		<li>{{ link_to_route('teams', 'Standings') }}</li>
	</ul>


</nav>
</div>

<div class = "container">

<br />

	@if(Session::has('message'))
		<p> {{ Session::get('message') }}</p>
	@endif

	@yield('content')
	
    {{ HTML::script('js/bootstrap.js') }}
</div>
</body>

</html>