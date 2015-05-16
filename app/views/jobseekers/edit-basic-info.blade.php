@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
		<div class="boxed">
			<nav class="ntv-menu">
				@include('includes.jobseekers.menu-ntv')
				@include('includes.jobseekers.menu-right')
			</nav>
			<div class="rows">
				<div class="title-page">
					<h2>Thông tin cơ bản</h2> 
				</div>
				<div class="box">
					@include('includes.notifications')
					{{ Form::open( array('route'=>array('edit-basic-info', $js->id), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Họ và tên</label>
								<div class="col-sm-2">
									{{ Form::select('gender', array('0'=>'Ông', '1'=>'Bà'), $js->gender, array('class'=>'form-control', 'id' => 'Gender') ) }}
								</div>
								<div class="col-sm-2">
									{{Form::input('text', 'first_name', $js->first_name,array('class'=>'form-control', 'placeholder'=>'Họ'))}}
								</div>
								<div class="col-sm-2">
									{{Form::input('text', 'last_name', $js->last_name,array('class'=>'form-control', 'placeholder'=>'Tên'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Nghề nghiệp</label>
								<div class="col-sm-6">
									{{Form::input('text', 'vocational', $js->vocational,array('class'=>'form-control', 'placeholder'=>'Digital Marketing Manager at Minh Phuc (MP Telecom)'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Ngày sinh</label>
								<div class="col-sm-1">
									{{ Form::selectRange('dob', 1, 31,$dob, array('class'=>'form-control', 'id'=> 'DateOfBirth')) }}
								</div>
								<span class="align-left">/</span>
								<div class="col-sm-1">
									{{ Form::selectRange('mob', 1, 31, $mob, array('class'=>'form-control', 'id'=> 'MonthOfBirth')) }}
								</div>
								<span class="align-left">/</span>
								<?php
									$date = date('Y', time());
								?>
								<div class="col-sm-2">
									{{ Form::selectRange('yob', $date, $date-60, $yob, array('class'=>'form-control', 'id'=> 'YearOfBirth')) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Quốc tịch</label>
								<div class="col-sm-2">
									{{ Form::select('country_id', Country::lists('country_name', 'id'), $js->country_id, array('class'=>'form-control', 'id' => 'Country') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-2">
									{{ Form::select('marital_status', array('0'=>'Độc thân', '1'=>'Đã kết hôn'), $js->marital_status, array('class'=>'form-control', 'id' => 'MaritalStatus') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Sở thích</label>
								<div class="col-sm-6">	
									{{Form::textarea('hobbies',$js->hobbies, array('class'=>'form-control', 'rows'=>'5')) }}

								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
								    {{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							    </div>
							</div>
						{{Form::close() }}
				</div>
			</div>
		</div>
	</section>
@stop