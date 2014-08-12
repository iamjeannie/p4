<!-- app/views/accounts/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
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

<h1>Create new guest</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'accounts')) }}

	<div class="form-group">
		{{ Form::label('name_first', 'Frist Name') }}
		{{ Form::text('name_first', Input::old('name_first'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('name_last', 'Last Name') }}
		{{ Form::text('name_last', Input::old('name_last'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('dob', 'DOB') }}
		{{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Phone Number') }}
		{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('address', 'Mailing Address') }}
		{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('event', 'Party/Event') }}
		{{ Form::select('event', array('birthday' => 'Birthday', 'babyshower' => 'Baby Shower', 'wedding' => 'Wedding', 'anniversary' => 'Anniversary'), Input::old('party'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Adding RSVP now!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
