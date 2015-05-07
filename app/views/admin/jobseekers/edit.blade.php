@extends('layouts.admin')
@section('title')Edit Jobseeker: {{ $js->username }} @stop
@section('content')
	<h3>Chỉnh sửa Người tìm việc: </h3>
	<hr>
	{{ Form::open( array('route'=>array('admin.jobseekers.update', $js->id), 'class'=>'form-horizontal', 'method'=>'PUT') ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'ntv_email', $js->ntv_email, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }} <i>Để trống là không sửa</i>
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hoten', $js->ntv_hoten, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Ngày sinh:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'ntv_ngaysinh', $js->ntv_ngaysinh, array('class'=>'form-control datepicker') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_gioitinh', array(1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ'), $js->ntv_gioitinh, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tình trạng hôn nhân:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_tinhtranghonnhan', array(1=>'Độc thân', 2=>'Đã lập gia đình'), $js->ntv_tinhtranghonnhan, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_diachi', $js->ntv_diachi, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh/Thành phố:</label>
			<div class="col-sm-2">
				{{ Form::select('ntv_tinhthanh', $provinces, $js->ntv_tinhthanh, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Facebook ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_fbID', $js->ntv_fbID, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Google Plus ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_googleID', $js->ntv_googleID, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Linked ID:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_linkedinID', $js->ntv_linkedinID, array('class'=>'form-control') ) }}
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
					(<a href="{{ URL::route('admin.resumes.edit', $cv->id) }}">Sửa</a> | 
					<a href="{{ URL::route('admin.resumes.show', $cv->id) }}" target="_blank">In</a>)
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