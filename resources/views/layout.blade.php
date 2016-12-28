<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
	      integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/app.css')}}"/>
</head>
<body>
<div class="flex-center position-ref full-height">
	<div class="top-right links">
		<a href="{{ route('home') }}">Home</a>
		@if(false == Session::has(SS_LOGIN))
			<a href="{{ route('auth.getLoginPage') }}">Login</a>
			<a href="{{ route('auth.getRegisterPage') }}">Register</a>
		@else
			<a href="{{route('auth.logout')}}">Log out</a>
		@endif
	</div>
	
	<div class="content">
		<div class="title m-b-md">
			@yield('title')
		</div>
		
		{{--Display error--}}
		@if(isset($errors) && $errors->count() > 0)
			<div id="alert-validation" class="alert alert-danger">
				@foreach($errors->all() as $error)
					{{$error}}.&nbsp;
				@endforeach
			</div>
		@endif
		
		@if(Session::has(FLASH_MESSAGE) && ($alert = Session::get(FLASH_MESSAGE)) instanceof \App\Models\Alert)
			<div id="flash-message" class="alert alert-{{$alert->getType()}}">
				{{$alert->getMessage()}}
			</div>
		@endif
		
		{{--Content--}}
		@yield('content')
		
		{{--<div class="links">--}}
		{{--<a href="https://laravel.com/docs">Documentation</a>--}}
		{{--<a href="https://laracasts.com">Laracasts</a>--}}
		{{--<a href="https://laravel-news.com">News</a>--}}
		{{--<a href="https://forge.laravel.com">Forge</a>--}}
		{{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
		{{--</div>--}}
	</div>
</div>
</body>
</html>