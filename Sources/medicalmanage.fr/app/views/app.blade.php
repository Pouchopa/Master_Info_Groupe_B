<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">ProjetKine	</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Accueil</a></li>
					<li><a href="{{ url('/contact') }}">Contact</a></li>
					@if(!Auth::guest())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultations<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/consultation/ask') }}">Prise de rendez-vous</a></li>
									<li><a href="{{ url('/consultation/show') }}">Historique des consultations</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pathologies<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/douleur/create') }}">Signaler une pathologie</a></li>
								<li><a href="{{ url('/douleur/show') }}">Historique</a></li>
							</ul>
						</li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if(Auth::guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">S'enregistrer</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->pseudo }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/patient/show') }}"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
								<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	</script>

	<script type="text/javascript">
	    jQuery(function ($) {
	        function init_map1() {
	            var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
	            var mapOptions = {
	                center: myLocation,
	                zoom: 16
	            };
	            var marker = new google.maps.Marker({
	                position: myLocation,
	                title: "Property Location"
	            });
	            var map = new google.maps.Map(document.getElementById("map1"),
	                mapOptions);
	            marker.setMap(map);
	        }
	        init_map1();
	    });
	</script>

	<style>
	    .map {
	        min-width: 300px;
	        min-height: 300px;
	        width: 100%;
	        height: 100%;
	    }

	    .header {
	        background-color: #F5F5F5;
	        color: #36A0FF;
	        height: 70px;
	        font-size: 27px;
	        padding: 10px;
	    }
	    a.newsomething{
	      color: #000;
	      &:hover {
	         color: #000;
	       }
	     }
     
	</style>

	<!-- Contact with Map - END -->


</body>
</html>
