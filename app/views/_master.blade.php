<!doctype html>

<html lang="en">

<head>
  <meta charset="utg-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', "Tell Me More")</title>
  <!-- Bootstrap core CSS -->
  <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Bootstrap theme -->
  <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @yield('head')
</head>

<body role="document">
  @if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif
  <div class="page-header">
    <a href="{{ URL::to('/') }}">
      <p style="text-align:center"><img src="{{ asset('images/shh.jpg') }}" alt="Shh..tell no more"></p>
    </a>
    <h1 class="logo_title">  </h1>
  </div>

  <div class='container'>
    @yield('content')
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>


</html>
