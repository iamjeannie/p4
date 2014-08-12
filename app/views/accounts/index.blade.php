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

<h1>All the accounts</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Birth Day</td>
			<td>Address</td>
			<td>Phone</td>
		</tr>
	</thead>
	<tbody>
	@foreach($accounts as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name_first }}</td>
			<td>{{ $value->name_last }}</td>
			<td>{{ $value->dob }}</td>
			<td>{{ $value->address }}</td>
			<td>{{ $value->phone }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the account (uses the destroy method DESTROY /accounts/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'accounts/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Account', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the account (uses the show method found at GET /accounts/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('accounts/' . $value->id) }}">Show this Guest Details</a>

				<!-- edit this account (uses the edit method found at GET /accounts/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('accounts/' . $value->id . '/edit') }}">Edit this Guest</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>
