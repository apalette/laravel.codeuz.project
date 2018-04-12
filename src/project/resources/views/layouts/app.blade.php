@extends('layouts.web')

@section('layout')
<!-- Navbar -->
<div id="navbar" class="navbar navbar-fixed-top navbar-default">
	<div class="navbar-container">
		<div class="navbar-header pull-left">
			<button type="button" class="navbar-toggle" id="sidebar-btn">
		    	<span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
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
    			<li>
        			<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img src="{{url('assets/app/img/profile.png')}}" width="24" />
                		<span class="user-infos hidden-xs">{{$user->first_name}} {{$user->last_name}}</span>
                		<span class="glyphicon glyphicon-triangle-bottom hidden-xs"></span>
                		<span class="glyphicon glyphicon-triangle-top hidden-xs"></span>
            		</a>
            		<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-off"></span> {{ucfirst(__('auth.logout'))}}</a></li>
            		</ul>
        		</li>
    		</ul>
		</div>
	</div>
</div>

<!-- Wrapper -->
<div class="main-container" id="wrapper">
   
	<!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
        	{!! ProjectMenu::branch([
        		'name' => 'Home',
				'paths' => ['/', '/home/*'],
				'icon' => 'glyphicon-home'
        		],[
        		['/', 'Dashboard'],
				['/home/page1', 'SubPage 1']	
        	]) !!}
        	
        	{!! ProjectMenu::branch([
        		'name' => 'Pages',
				'paths' => ['/page2*'],
				'icon' => 'glyphicon-list-alt'
        		],[
        		['/page2', 'Page 2']
        	]) !!}
        </ul>
    </div>  
   
   	<!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){
	$('#sidebar-btn').click(function(){
		$('#wrapper').toggleClass('toggled');
	});
});
</script>
@yield('js')
@endsection
