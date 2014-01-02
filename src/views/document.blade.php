<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{{ Config::get('dox::title', 'Documentation') }}}</title>

	<!-- Bootstrap core CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<style type="text/css">
		body { padding-top: 20px; padding-bottom: 20px; }
		.navbar { margin-bottom: 20px; }

		nav ul { list-style: none; list-style-image: none; margin: 0; padding: 0; }
		nav ul li { padding: 5px 0;}
		nav ul li ul { margin-bottom: 25px; margin-left: 20px; }
		nav ul li ul li { padding: 0; }
	</style>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<div class="container">

	<!-- Static navbar -->
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{{ Config::get('dox::uri', '/docs/') }}}">{{{ Config::get('dox::title', 'Documentation') }}}</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="{{{ URL::current() }}}">{{{ $navigation['title'] }}}</a></li>
				@if ($navigation['prev'])
				<li><a href="{{{ $navigation['prev']['uri'] }}}">&larr; {{{ $navigation['prev']['title'] }}}</a></li>
				@endif
				@if ($navigation['next'])
				<li><a href="{{{ $navigation['next']['uri'] }}}">{{{ $navigation['next']['title'] }}} &rarr;</a></li>
				@endif
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>

	<!-- Main component for a primary marketing message or call to action -->
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				{{ $content }}

				<nav>
					<ul class="pager">
					@if ($navigation['prev'])
						<li class="previous"><a href="{{{ $navigation['prev']['uri'] }}}">&larr; {{{ $navigation['prev']['title'] }}}</a>
					@else
						<li class="previous disabled"><a href="#">&larr;</a></li>
					@endif
					@if ($navigation['next'])
						<li class="next"><a href="{{{ $navigation['next']['uri'] }}}">{{{ $navigation['next']['title'] }}} &rarr;</a>
					@else
						<li class="next disabled"><a href="#">&rarr;</a></li>
					@endif
					</ul>
				</nav>
			</div>
			<div class="col-md-3">
				<nav>
				{{ $index }}
				</nav>
			</div>
		</div>
	</div>

</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>
</html>
