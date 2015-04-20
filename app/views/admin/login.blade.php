<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Login</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Vnjobs Login</h1>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					
					{{ Form::open(array('class'	=> 'form-horizontal')) }}
						@include('includes.notifications')
						<div class="form-group">
							<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
							<div class="col-sm-10">
								{{ Form::input('text', 'username', null, array('class'=>'form-control') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="input" class="col-sm-2 control-label">Password:</label>
							<div class="col-sm-10">
								{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
							</div>
						</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									{{ Form::button('Login', array('class'=>'btn btn-primary', 'type'=>'submit') ) }}
								</div>
							</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>