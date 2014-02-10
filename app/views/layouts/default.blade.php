<!DOCTYPE html>

<html lang="en">
<head>
	<br/>
	<title>{{$title}}</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::style('css/bootswatch.min.css') }}
	{{ HTML::style('css/bootstrap-sortable.css') }}
	{{ HTML::style('css/main.css') }}
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>

<div class = "navbar navbar-fixed-top">
<div class = "navbar-inner">
<div class = "container">	

	<ul class = "nav">
		
		<li>{{ link_to_route('home', 'Home') }}</li>
		<li>{{ link_to_route('players', 'Player Statistics') }}</li>
		<li>{{ link_to_route('teams', 'League Standings') }}</li>
		<li>{{ link_to_route('matches', 'Match Results') }}</li>

		 @if(!Auth::check())
                    <li>{{ link_to_route('register', 'Coaches Registration') }}</li>   
                    <li>{{ link_to_route('login', 'Coaches Login') }}</li>   
                @else
                    <li>{{ link_to_route('dashboard', 'Coach Dashboard')}}</li>
                    <li>{{ link_to_route('logout', 'Logout') }}</li>
                @endif
		
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
    {{ HTML::script('js/bootstrap-sortable.js') }}
    {{ HTML::script('js/moment-min.js') }}
</div>
</body>

</html>
