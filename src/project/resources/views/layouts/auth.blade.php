@extends('layouts.web')

@section('layout')
<!-- Navbar -->
<div id="navbar" class="navbar navbar-fixed-top navbar-default">
	<div class="navbar-container">
		<div class="navbar-header pull-left">
			<a href="{{url('/')}}" class="navbar-brand"><img src="{{url('assets/app/img/logo.png')}}" alt="{{env('APP_NAME')}}" height="25" /></a>
		</div>
	</div>
</div>

<!-- Wrapper -->
<div class="auth-container">
	@yield('content')
</div>
@endsection