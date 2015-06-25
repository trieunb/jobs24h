<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		<!-- Bootstrap CSS -->
		 
		{{ HTML::style('cungunglaodong/assets/css/bootstrap.min.css') }}
   		{{ HTML::style('cungunglaodong/assets/css/style.css') }}
    	{{ HTML::style('cungunglaodong/assets/css/font-awesome.min.css') }}
    	 
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	@include('includes.cungunglaodong.header')

		@yield('content')

	@include('includes.cungunglaodong.footer')
	</body>
</html>