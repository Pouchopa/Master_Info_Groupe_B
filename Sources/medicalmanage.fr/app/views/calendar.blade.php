<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.print.css" rel="stylesheet"> !-->



	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


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
				<a class="navbar-brand" href="#">ProjetKine	</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/patient/dashboard') }}">Accueil</a></li>
					@if(!Auth::guest())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultations<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/consultation/calendar') }}">Calendrier des consultations</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pathologies<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/patient/dashboard') }}">Historique</a></li>
								<li><a href="{{ url('/patient/dashboard') }}">Signaler une pathologie</a></li>
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
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


	<link rel='stylesheet' href='../../public/packages/fullcalendar-2.6.1/lib/cupertino/jquery-ui.min.css' />
	<link href='../../public/packages/fullcalendar-2.6.1/fullcalendar.css' rel='stylesheet' />
	<link href='../../public/packages/fullcalendar-2.6.1/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='../../public/packages/fullcalendar-2.6.1/lib/moment.min.js'></script>
	<script src='../../public/packages/fullcalendar-2.6.1/lib/jquery.min.js'></script>
	<script src='../../public/packages/fullcalendar-2.6.1/fullcalendar.min.js'></script>
	<script src='../../public/packages/fullcalendar-2.6.1/lang-all.js'></script>
<script>

	$(document).ready(function() {
		var currentLangCode = 'en';

		// build the language selector's options
		$.each($.fullCalendar.langs, function(langCode) {
			$('#lang-selector').append(
				$('<option/>')
					.attr('value', langCode)
					.prop('selected', langCode == currentLangCode)
					.text(langCode)
			);
		});

		// rerender the calendar when the selected option changes
		$('#lang-selector').on('change', function() {
			if (this.value) {
				currentLangCode = this.value;
				$('#calendar').fullCalendar('destroy');
				renderCalendar();
			}
		});

		function renderCalendar() {
			$('#calendar').fullCalendar({
				theme: true,
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: new Date(),
				lang: currentLangCode,
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
					var title = prompt('Event Title:');
					var eventData;
					if (title) {
						eventData = {
							title: title,
							start: start,
							end: end
						};
						$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
					}
					$('#calendar').fullCalendar('unselect');
				},
				buttonIcons: false, // show the prev/next text
				weekNumbers: true,
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				businessHours: true,
				events: [
									{
						title: 'Business Lunch',
						start: '2016-03-03T13:00:00',
						constraint: 'businessHours'
					},
					{
						title: 'Meeting',
						start: '2016-03-13T11:00:00',
						constraint: 'availableForMeeting', // defined below
						color: '#257e4a'
					},
					{
						title: 'Conference',
						start: '2016-03-18',
						end: '2016-03-20'
					},
					{
						title: 'Party',
						start: '2016-03-29T20:00:00'
					},

					// areas where "Meeting" must be dropped
					{
						id: 'availableForMeeting',
						start: '2016-03-11T10:00:00',
						end: '2016-03-11T16:00:00',
						rendering: 'background'
					},
					{
						id: 'availableForMeeting',
						start: '2016-03-13T10:00:00',
						end: '2016-03-13T16:00:00',
						rendering: 'background'
					},

					// red areas where no events can be dropped
					{
						start: '2016-03-24',
						end: '2016-03-28',
						overlap: false,
						rendering: 'background',
						color: '#ff9f89'
					},
					{
						start: '2016-03-06',
						end: '2016-03-08',
						overlap: false,
						rendering: 'background',
						color: '#ff9f89'
					},
					{
						title: 'All Day Event',
						start: '2016-01-01'
					},
					{
						title: 'Long Event',
						start: '2016-01-07',
						end: '2016-01-10'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2016-01-09T16:00:00'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2016-01-16T16:00:00'
					},
					{
						title: 'Conference',
						start: '2016-01-11',
						end: '2016-01-13'
					},
					{
						title: 'Meeting',
						start: '2016-01-12T10:30:00',
						end: '2016-01-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2016-01-12T12:00:00'
					},
					{
						title: 'Meeting',
						start: '2016-01-12T14:30:00'
					},
					{
						title: 'Happy Hour',
						start: '2016-01-12T17:30:00'
					},
					{
						title: 'Dinner',
						start: '2016-01-12T20:00:00'
					},
					{
						title: 'Birthday Party',
						start: '2016-01-13T07:00:00'
					},
					{
						title: 'Click for Google',
						url: 'http://google.com/',
						start: '2016-01-28'
					}
				]
			});
		}

		renderCalendar();
	});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#top {
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		font-size: 12px;
	}

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>
	<script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	</script>

</body>
</html>
