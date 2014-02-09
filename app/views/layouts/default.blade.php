<!DOCTYPE html>

<html lang="en">
<head>
	<title>{{$title}}</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::style('css/bootswatch.min.css') }}
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>

<div class = "navbar navbar-fixed-top">
<div class = "navbar-inner">
<div class = "container">	

	<ul class = "nav">
		
		<li>{{ link_to_route('home', 'Home') }}</li>
		<li>{{ link_to_route('players', 'Players') }}</li>
		<li>{{ link_to_route('teams', 'Standings') }}</li>
		<li>{{ link_to_route('matches', 'Matches') }}</li>
	</ul>

</div>
</div>
</div>

<div class = "container">

<br />
<br/>

	@if(Session::has('message'))
		<p> {{ Session::get('message') }}</p>
	@endif

	@yield('content')
	
    {{ HTML::script('js/bootstrap.js') }}
</div>
</body>

</html>
