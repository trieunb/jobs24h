@extends('layouts.jobseeker')
@section('title') Tạo tài khoản @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
			<div class="col-sm-5">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="customer-review carousel-inner" role="listbox">
				    <div class="item active">
				      {{ HTML::image('assets/images/doanhnhan/SteveJobs.jpg') }}
				      <div class="carousel-caption">
				        <span class="caption"><h3>Steve Jobs</h3> Cựu CEO của Apple</span>
				      </div>
				      <span class="opinion">“Hãy cứ khát khao, hãy cứ dại khờ”</span>
				    </div>
				    <div class="item">
				      {{ HTML::image('assets/images/doanhnhan/BillGates.jpg') }}
				      <div class="carousel-caption">
				        <span class="caption"><h3>Bill Gates</h3> Chủ tịch tập đoàn Microsoft</span>
				      </div>
				      <span class="opinion">“Nếu bạn sinh ra trong nghèo khó, đó không phải lỗi của bạn.
						<br>Nhưng nếu bạn chết trong nghèo khó, thì đó là lỗi của bạn”</span>
				    </div>
				    <div class="item">
				      {{ HTML::image('assets/images/doanhnhan/JackMa.jpg') }}
				      <div class="carousel-caption">
				        <span class="caption"><h3>Jack Ma</h3> Chủ tịch hãng TMĐT Alibaba</span>
				      </div>
				      <span class="opinion">“Nếu bạn không bắt tay vào thực hiện, chẳng có gì là có thể cả”.</span>
				    </div>
				    <div class="item">
				      {{ HTML::image('assets/images/doanhnhan/WarrenBuffett.jpg') }}
				      <div class="carousel-caption">
				        <span class="caption"><h3>Warren Buffett</h3> Giám đốc điều hành Berkshire Hathaway</span>
				      </div>
				      <span class="opinion">“Quy tắc số 1: không bao giờ để mất tiền. Quy tắc số 2: Đừng bao giờ quên quy tắc số 1”</span>
				    </div>
				    <div class="item">
				      {{ HTML::image('assets/images/doanhnhan/OprahWinfrey.jpg') }}
				      <div class="carousel-caption">
				        <span class="caption"><h3>Oprah Winfrey</h3> CEO của Oprah Winfrey Network</span>
				      </div>
				      <span class="opinion">“Bạn sẽ trở thành những gì mà bạn tin vào. Vị trí của bạn ngày hôm nay trong cuộc đời xuất phát từ tất cả những gì mà bạn đặt niềm tin”</span>
				    </div>

				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    {{ HTML::image('assets/images/pre.png') }}
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    {{ HTML::image('assets/images/next.png') }}
				    <span class="sr-only">Next</span>
				  </a>
				</div>	
				<div class="faq clearfix">
				<p>{{ HTML::image('assets/images/faq.png') }} Bạn đã có tài khoản? <a href="{{URL::route('jobseekers.login')}}" class="text-blue decoration">Đăng nhập tại đây</a></p>
				<span>Hoặc đăng nhập bằng: 
						<a href="{{URL::route('auth_fb')}}"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-face"></i>
	                    	<i class="fa fa-facebook fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-google-plus"></i>
	                    	<i class="fa fa-google-plus fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="{{URL::route('auth_in')}}"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-linkedin"></i>
	                    	<i class="fa fa-linkedin fa-stack-1x text-white"></i>
	                    </span></a>
	                    <a href="#"><span class="fa-stack fa-lg">
	                		<i class="fa fa-circle fa-stack-2x text-yahoo"></i>
	                    	<i class="fa fa-yahoo fa-stack-1x text-white"></i>
	                    </span></a>
	            </span>
	            </div>
			</div>
			<div class="col-sm-6 pull-right">
				<h2 class="text-orange">Đăng Ký Thành Viên</h2>
				@include('includes.notifications')
				{{ Form::open( array('route'=>array('jobseekers.register'), 'class'=>'form', 'method'=>'POST') ) }}
					<div class="form-group row">
						<div class="col-sm-6">
							<label for="">Họ-Tên lót<abbr>(*)</abbr></label>
							{{ Form::input('text', 'first_name',null, array('class'=>'form-control', 'id'=>'first_name') ) }}
						</div>
						<div class="col-sm-6 ">
							<label for="">Tên<abbr>(*)</abbr></label>
							{{ Form::input('text', 'last_name',null, array('class'=>'form-control', 'id'=>'last_name') ) }}
						</div>
					</div>
					<div class="form-group">
							<label for="">Email<abbr>(*)</abbr></label>
							{{ Form::input('email', 'email',null, array('class'=>'form-control', 'id'=>'email') ) }}
					</div>
					<div class="form-group">
							<label for="">Mật khẩu<abbr>(*)</abbr></label>
							{{ Form::input('password', 'password',null, array('class'=>'form-control', 'id'=>'password') ) }}	
					</div>
					<div class="form-group">
							<label for="">Nhập lại mật khẩu<abbr>(*)</abbr></label>
							{{ Form::input('password', 'password_confirmation',null, array('class'=>'form-control', 'id'=>'password_confirmation') ) }}	
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								{{ Form::checkbox('subscribe', '1', null, array('id'=>'subscribe', 'class'=>'subscribe'))}}
								Nhận email bản tin <a href="#" class="text-blue">vnjobs.vn</a>
							</label>
						</div>
					</div>
					<p><i class="fa fa-arrow-circle-o-right fa-1x"></i> Click Đăng ký, bạn đã đồng ý với <span class="text-orange">Quy định bảo mật</span> và <span class="text-orange">Thỏa thuận sử dụng</span> của <span class="text-blue">Vnjobs.vn</span></p>
					{{Form::submit('Đăng ký', array('class' =>'btn btn-lg bg-orange'))}}
				{{ Form::close() }}
			</div>
	</section>

@stop