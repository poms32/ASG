<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title>{{$pageTitle or "Amazing Site Generator"}}</title>
		
		<!-- Maniac stylesheets -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{asset('css/animate/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/iCheck/all.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
		@yield('page_style')
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	@yield('body')
        <!-- Javascript -->
         <script src="{{asset('js/plugins/jquery/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/jquery-ui/jquery-ui-1.10.4.min.js')}}" type="text/javascript"></script>
		
		<!-- Bootstrap -->
        <script src="{{asset('js/plugins/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
	@yield('scripts')
	</body>
</html>