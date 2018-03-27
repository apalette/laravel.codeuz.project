<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    	
    	<title>{{env('APP_NAME')}} - @yield('title')</title>
    	
    	<link href="{{url('favicon.ico')}}" type="image/x-icon" rel="icon"/>
    	<link href="{{url('favicon.ico')}}" type="image/x-icon" rel="shortcut icon"/>
    	<link href="{{url('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    	<link href="{{url('assets/app/css/main.css')}}" rel="stylesheet" />
    	@yield('css')

    	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		
		@yield('layout')

	    <!-- JS -->
	    <script src="{{url('assets/libs/jquery/js/jquery.min.js')}}"></script>
	    <script src="{{url('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
	    @yield('js')
	    
</body>
</html>