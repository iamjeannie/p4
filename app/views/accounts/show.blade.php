<!-- app/views/accounts/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('accounts') }}"> </a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('accounts') }}">View All Guests</a></li>
		<li><a href="{{ URL::to('accounts/create') }}">Adding new guest RSVP</a>
	</ul>
</nav>

<h1>Showing {{ $account->name_first }}</h1>

	<div class="jumbotron text-center">
		<h2>coming for your {{ $account->event }}</h2>
		<p> here's contact info:</p>
		<p>
			<strong>Email:</strong> {{ $account->email }}<br>
			<strong>Phone Number:</strong> {{ $account->phone }}<br>
			<strong>Address:</strong> {{ $account->address }}<br>
		</p>
	</div>

</div>
</body>
</html>
