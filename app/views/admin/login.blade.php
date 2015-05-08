<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Login - VNJobs</title>

		<!-- Bootstrap CSS -->
		
		{{ HTML::style('assets/css/bootstrap.min.css') }}
		{{ HTML::style('assets/css/admin-login.css') }}

		
	</head>
	<body>
		<div class="container">
			<div class="card card-container">
				{{ HTML::image('assets/img/avatar_2x.png', '', array('id'=>'profile-img', 'class'=>'profile-img-card')) }}
				@include('includes.notifications')
				<p id="profile-name" class="profile-name-card"></p>
				{{ Form::open(array('class'	=> 'form-horizontal form-signin')) }}
					<span id="reauth-email" class="reauth-email"></span>
					{{ Form::input('text', 'username', null, array('class'=>'form-control', 'id'=>'inputEmail', 'required', 'autofocus', 'placeholder'=>'Username') ) }}
					{{ Form::input('password', 'password', null, array('class'=>'form-control', 'id'=>'inputPassword', 'required', 'placeholder'=>'Password') ) }}
					<div id="remember" class="checkbox">
						<label>
							{{ Form::checkbox('remember', 1, true) }} Remember me
							
						</label>
					</div>
					{{ Form::button('Sign In', array('class'=>'btn btn-lg btn-primary btn-block btn-signin', 'type'=>'submit')) }}

				{{ Form::close() }}<!-- /form -->
				
			</div><!-- /card-container -->
		</div><!-- /container -->

		<!-- jQuery -->
		{{ HTML::script('assets/js/jquery-1.11.1.js') }}
		<!-- Bootstrap JavaScript -->
		{{ HTML::script('assets/js/bootstrap.js') }}
	</body>
</html>