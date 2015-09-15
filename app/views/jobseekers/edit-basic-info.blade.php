@extends('layouts.jobseeker')
@section('title') Chỉnh sửa thông tin tài khoản @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Thông tin cơ bản</h2> 
				</div>
				<div class="box edit-basic">
					@include('includes.notifications')
					<div class="row">
					{{ Form::open( array('route'=>array('edit-basic-info', 'basic-info',$user->id), 'class'=>'form-horizontal', 'method'=>'POST', 'files'=>'true') ) }}
						<div class="col-sm-3">
							<div class="avatar">
								@if($user->avatar !=null)
									{{ HTML::image('uploads/jobseekers/avatar/'.$user->avatar.'') }}
								@else
									{{ HTML::image('assets/images/logo.png') }}
								@endif
							</div>
							<div class="fileUpload btn bg-orange col-sm-5">
								Chọn tệp tin
								{{ Form::file('cv_upload',array('class'=>'upload', 'id' =>'uploadBtn', 'accept'=>'image/*')) }}
							</div>
							<div class="col-sm-7">
								{{Form::input('text', 'file_name', null, array('class'=>'form-control', 'id'=>'uploadFile', 'disabled', 'placeholder'=>'không có tệp nào được chọn'))}}
							</div>
							<small class="legend">Chú ý: Ảnh tải lên không vượt quá 2MB</small>
						</div>
						<div class="col-sm-9">
							<h3 class="text-orange">* Thông tin cá nhân</h3>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Họ và tên <abbr>*</abbr></label>
								<div class="col-sm-2">
									{{ Form::select('gender', array('0'=>'Ông', '1'=>'Bà'), $user->gender, array('class'=>'form-control', 'id' => 'Gender') ) }}
								</div>
								<div class="col-sm-2">
									{{Form::input('text', 'first_name', $user->first_name,array('class'=>'form-control', 'placeholder'=>'Họ'))}}
								</div>
								<div class="col-sm-2">
									{{Form::input('text', 'last_name', $user->last_name,array('class'=>'form-control', 'placeholder'=>'Tên'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Ngày sinh<abbr>*</abbr></label>
								<div class="col-sm-6">
								<div class="input-group date" id="DOB">
					                {{Form::input('text','date_of_birth', date('d-m-Y',strtotime($user->date_of_birth)), array('class'=>'date_of_birth form-control','placeholder'=>'DD-MM-YYYY','data-date-format'=>'DD-MM-YYYY'))}}
					            	<span class="input-group-addon have-img">
					                   	{{HTML::image('assets/images/calendar.png')}}
					                </span>
					            </div>
					            </div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Điện thoại<abbr>*</abbr></label>
								<div class="col-sm-6">
									{{Form::input('text', 'phone_number', $user->phone_number,array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Nghề nghiệp</label>
								<div class="col-sm-6">
									{{Form::input('text', 'vocational', $user->nghenghiep,array('class'=>'form-control', 'placeholder'=>'Digital Marketing Manager at Minh Phuc (MP Telecom)'))}}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Quốc tịch</label>
								<div class="col-sm-2">
									{{ Form::select('country_id', Country::lists('country_name', 'id'), $user->country_id, array('class'=>'form-control', 'id' => 'Country') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Tình trạng hôn nhân</label>
								<div class="col-sm-2">
									{{ Form::select('marital_status', array('0'=>'Độc thân', '1'=>'Đã kết hôn'), $user->marital_status, array('class'=>'form-control', 'id' => 'MaritalStatus') ) }}
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Sở thích</label>
								<div class="col-sm-6">	
									{{Form::textarea('hobbies',$user->hobbies, array('class'=>'form-control', 'rows'=>'5')) }}

								</div>
							</div>
							<div class="form-group">
							    <div class="col-sm-offset-3 col-sm-9">
								    {{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
								    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							    </div>
							</div>
							</div>
					{{Form::close() }}
					</div>
					<div class="row" style="border-top: 1px solid #EFEFEF; padding-top:15px;">
					<div class="col-sm-9 pull-right">
					{{ Form::open( array('route'=>array('edit-basic-info', 'change-pass'), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
						<h3 class="text-orange">* Đổi mật khẩu</h3>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Mật khẩu hiện tại</label>
							<div class="col-sm-6">	
								{{Form::input('password','old-password',null, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Mật khẩu mới</label>
							<div class="col-sm-6">	
								{{Form::input('password','password',null, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Xác nhận mật khẩu mới</label>
							<div class="col-sm-6">	
								{{Form::input('password','password_confirmation',null, array('class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								{{Form::submit('Lưu', array('class'=>'btn btn-lg bg-orange'))}}
							    <a href="#" class="text-blue">Hủy bỏ và quay trở lại trang trước</a>
							</div>
						</div>
					{{Form::close() }}
						</div>
						</div>
				</div>
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script>
	jQuery(document).ready(function($) {
		 $('#uploadBtn').on('change', function(event) {
		 var image = this.files[0]; 	 
		 $('.avatar').html(''); //we set the innerHTML of the div to null
		 var reader = new FileReader(); // the jQuery FileReader class
		 reader.onload = function(e){ // whatever we want FileReader to do, wee need to do that when it loads
			 $('<img src="' + e.target.result + '" class="thumbnail img-responsive" width="100%" alt="Loading..">').appendTo($('.avatar'));
		 }
		 reader.readAsDataURL(image); // this gives our file to the FileReader() and uses the onload function to do our bidding.
		 });
	});
	</script>
@stop