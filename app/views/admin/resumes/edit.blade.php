@extends('layouts.admin')
@section('title')Edit Resume @stop
@section('content')
	<h3>Thêm mới CV: </h3>
	<hr>
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.resumes.update'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'username', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Tiêu đề CV:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mục tiêu nghề nghiệp:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Học vấn:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Cty gần đây:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Công việc gần đây:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Cấp bậc hiện tại:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Vị trí mong muốn:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Cấp bậc mong muốn:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Mức lương mong muốn:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Thành tích:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Tham khảo:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'ntv_hocvan', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</div>
	{{ Form::close() }}
@stop