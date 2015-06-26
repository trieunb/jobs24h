<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
    {{ HTML::style('training/assets/css/bootstrap.min.css') }}
    {{ HTML::style('training/assets/css/style.css') }}
    {{ HTML::style('training/assets/css/font-awesome.css') }}
    {{ HTML::style('training/assets/css/animate.css') }}


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
   {{ HTML::script('training/assets/js/jquery.min.js') }}
   {{ HTML::script('training/assets/js/bootstrap.min.js') }}
   {{ HTML::script('training/assets/js/scripts.js') }}
   {{ HTML::script('training/assets/js/wow.min.js') }}
   
  
@yield('style')
	 




	 
</head>

<body>

@yield('header')

<section id="main-content">

@yield('content')


</section>




 
@include('includes.trainings.footer')


</body>
</html>