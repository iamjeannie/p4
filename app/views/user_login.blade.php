@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<div class="container">

	<h1>Log in</h1>

	<!-- {{ Form::label('name_first', 'Frist Name') }}
	{{ Form::text('name_first', Input::old('name_first'), array('class' => 'form-control')) }}
 -->

	{{ Form::open(array('url' => '/login')) }}
	<div class="form-group">
			Email<br>
			{{ Form::text('email') }}<br><br>

			Password:<br>
			{{ Form::password('password') }}<br><br>

			{{ Form::submit('Submit') }}

			{{ Form::close() }}
			<br>
			"or"
			<a href="/signup">Sign up here</a>
			<br>
	</div>
</div>
@stop
