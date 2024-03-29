@extends('layouts.admin')
@section('title')Edit Jobseeker: {{ $js->username }} @stop
@section('page-header')Chỉnh sửa người tìm việc @stop
@section('content')
	{{ Form::open( array('route'=>array('admin.jobseekers.post-edit', $js->id), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', $js->email, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }} <i>Để trống là không sửa</i>
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'first_name', $js->first_name, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tên:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'last_name', $js->last_name, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngày sinh:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'date_of_birth', $js->date_of_birth, array('class'=>'form-control datepicker') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'phone_number', $js->phone_number, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('gender', array(1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ'), $js->gender, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tình trạng hôn nhân:</label>
			<div class="col-sm-2">
				{{ Form::select('marital_status', array(1=>'Độc thân', 2=>'Đã lập gia đình'), $js->marital_status, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', $js->address, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quốc tịch:</label>
			<div class="col-sm-2">
				{{ Form::select('country_id', $countries, $js->country_id, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh/Thành phố:</label>
			<div class="col-sm-2">
				{{ Form::select('province_id', $provinces, $js->province_id, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Facebook ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'facebook_ID', $js->facebook_ID, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Google Plus ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'gplus_ID', $js->gplus_ID, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Linked ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'linkedin_ID', $js->linkedin_ID, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('activated', array(1=>'Kích hoạt', 0=>'Không kích hoạt'), (($js->activated==true)?1:0), array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Danh sách hồ sơ:</label>
			<div class="col-sm-10">
				@foreach($cvlist as $cv)
					<i class="glyphicon glyphicon-hand-right"></i> {{ $cv->ntv_tieudeCV }} 
					<a href="{{ URL::route('admin.resumes.edit1', $cv->id) }}">{{ $cv->tieude_cv }} </a>
					<br>
				@endforeach
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker3.css') }}
@stop
@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.vi.js') }}
	<script type="text/javascript">
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			language: "vi",
			autoclose: true,
			todayHighlight: true,
			endDate: new Date(),
		});
	</script>
@stop