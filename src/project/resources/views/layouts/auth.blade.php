@extends('layouts.web')

@section('layout')
<!-- Navbar -->
<div id="navbar" class="navbar navbar-fixed-top navbar-default">
	<div class="navbar-container">
		<div class="navbar-header pull-left">
			<a href="{{url('/')}}" class="navbar-brand"><img src="{{url('assets/app/img/logo.png')}}" alt="{{env('APP_NAME')}}" height="25" /></a>
		</div>
		
		<div class="pull-right" role="navigation">
    		<ul class="nav user-nav">
    			@if (count($languages) > 1)
    			<li>
        			<a data-toggle="dropdown" href="#" class="dropdown-toggle">
        				<img src="{{url('assets/app/img/lang/')}}/{{App::getLocale()}}.png" />
        				<span class="glyphicon glyphicon-triangle-bottom hidden-xs"></span>
                		<span class="glyphicon glyphicon-triangle-top hidden-xs"></span>
        			</a>
        			<ul class="lang-menu dropdown-menu dropdown-menu-lang">
        				@foreach ($languages as $lang)
        				@if ($lang != App::getLocale())
						<li>
							<form class="form-horizontal" method="POST"  action="{{ url('/language') }}">
								{{ csrf_field() }}
								<input type="hidden" name="lang_url" value="{{url()->current()}}" />
								<input type="hidden" name="lang_value" value="{{$lang}}" />
                				<button class="btn-nostyle"><img src="{{url('assets/app/img/lang/')}}/{{$lang}}.png" /></button>
							</form>
						</li>
            			@endif
            			@endforeach
            		</ul>
        		</li>
        		@endif
    		</ul>
		</div>
	</div>
</div>

<!-- Wrapper -->
<div class="auth-container">
	@yield('content')
</div>
@endsection