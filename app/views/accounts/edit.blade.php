<!-- app/views/nerds/edit.blade.php -->

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
		<a class="navbar-brand" href="{{ URL::to('nerds') }}"> </a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('accounts') }}">View All Accounts</a></li>
		<li><a href="{{ URL::to('accounts/create') }}">Create a Account</a>
	</ul>
</nav>

<h1>Edit {{ $account->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($account, array('route' => array('accounts.update', $account->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name_first', 'Frist Name') }}
		{{ Form::text('name_first', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('name_last', 'Last Name') }}
		{{ Form::text('name_last', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('dob', 'DOB') }}
		{{ Form::text('dob', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Phone Number') }}
		{{ Form::text('phone', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('address', 'Mailing Address') }}
		{{ Form::text('address', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('event', 'Party/Event') }}
		{{ Form::select('event', array('0' => 'Birthday', '1' => 'Baby Shower', '2' => 'Wedding', '3' => 'Anniversary'), null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Account!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
