<!DOCTYPE html>

<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
    

	    <title>{{$title}}</title>

	    <!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="css/grid.css" rel="stylesheet">

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    	
    <link href="css/main.css" rel="stylesheet">
  
  	</head>

	<body>

	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">NSCL.info</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        
        <li>{{ link_to_route('home', 'Home') }}</li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">League Statistics <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            <li>{{ link_to_route('teams', 'League Standings') }}</li>
            
            <li>{{ link_to_route('players', 'Player Statistics') }}</li>
            
            <li>{{ link_to_route('matches', 'Match Results') }}</li>
                        
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            <li role="presentation" class="dropdown-header">North Division</li>

            @foreach($teams as $team)
          
              @if ($team -> division === 'North')
                
                  <li>{{ link_to_route('team', $team -> school, array($team->id)) }}</li>
                                  
              @endif
          
            @endforeach

            <li role="presentation" class="dropdown-header">South Division</li>

            @foreach($teams as $team)
          
              @if ($team -> division === 'South')
                
                  <li>{{ link_to_route('team', $team -> school, array($team->id)) }}</li>
                                  
              @endif
          
            @endforeach

                                    
          </ul>
        </li>

        @if(Auth::check())
          <li>{{ link_to_route('dashboard', 'Coach Dashboard')}}</li>
        @endif

      <!-- THIS CODE WILL EVENTUALLY BE FOR SELECTING THE SEASON. 
      AT THE MOMENT I DON'T HAVE A GOOD WAY TO MAKE IT WORK WITH ELOQUENT MODELS IN LARAVEL
      THIS MAY BE SOMETHING TO LOOK AT DOING WHEN I EVENTUALLY MIGRATE TO A DIFFERENT FRAMEWORK 
        <form class="navbar-form navbar-left" method="get">

      
      <div class="form-group">
      

        <select class="form-control" id="select" onchange="location = this.options[this.selectedIndex].value;">
          <option value = "changeSeasonCurrent">Current Season</option>
          <option value = "changeSeason2014">2014-2015 Season</option>
        </select>
        
      </div>
        </form>
      -->

             
      </ul>  

      <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
                <li>{{ link_to_route('login', 'Coach Login') }}</li> 
            @else
                <p class="navbar-text">Welcome, {{$currentUser}} Coach</p>
                <li>{{ link_to_route('logout', 'Logout') }}</li>
            @endif 
                
        </ul>      
        
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	
	<div class = "container">
    

		
		@if(Session::has('message'))
			<p> {{ Session::get('message') }}</p>
		@endif

		
		@yield('content')
	
    
    	{{ HTML::script('js/bootstrap-sortable.js') }}
    	{{ HTML::script('js/moment-min.js') }}

    
	</div>

  

	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  		ga('create', 'UA-48003312-1', 'nscl.info');
  		ga('send', 'pageview');

	</script>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



	</body>

  
        

</html>
