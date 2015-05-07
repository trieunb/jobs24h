@extends('layouts.admin')
@section('title')Add new Resume @stop
@section('content')
	<h3>Thêm mới CV: </h3>
	<hr>
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.resumes.update', $id), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'username', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Tiêu đề CV:</label>
			<div class="col-sm-8">
				{{ Form::input('email', 'email', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mục tiêu NN:</label>
			<div class="col-sm-8">
				{{ Form::textarea('dinhhuongnn', null, array('class'=>'form-control', 'rows'=>'5') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Học Vấn:</label>
			<div class="col-sm-10">
				<div class="col-xs-12">
					<ul>
						<li><a href="#" onclick="return false;">Trường Đại học Đà Nẵng</a></li>
						<li><a href="#" onclick="return false;">Trung tâm Nhật Ngữ Jelly Fish</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-3">
					<button type="button" class="btn btn-success">Thêm mới</button>
				</div>
				<div class="col-xs-10">
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Chuyên ngành:</label>
						<div class="col-sm-10">
							{{ Form::input('text', 'subject', null, array('class'=>'form-control') ) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Trường:</label>
						<div class="col-sm-10">
							{{ Form::input('text', 'school', null, array('class'=>'form-control') ) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Bằng cấp:</label>
						<div class="col-sm-4">
							{{ Form::select('level', $certificates, null, array('class'=>'form-control') ) }}
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công ty gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'ctyganday', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Công việc gần đây:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'cvganday', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc hiện tại:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'capbachientai', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'vitrimongmuon', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cấp bậc mong muốn:</label>
			<div class="col-sm-8">
				{{ Form::input('text', 'capbacmongmuon', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_noilamviec', Province::lists('tentinh', 'id'), null, array('multiple'=>'multiple', 'class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_nganhnghe', Category::lists('tennganh', 'id'), null, array('multiple'=>'multiple', 'class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương mong muốn:</label>
			<div class="col-sm-1">
				{{ Form::input('text', 'ntv_mucluongmongmuon', '0', array('class'=>'form-control') ) }}
			</div>
			<div class="col-xs-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1">
						Thương lượng
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Thành tích:</label>
			<div class="col-sm-8">
				{{ Form::textarea('ntv_thanhtich', null, array('class'=>'form-control', 'rows'=>'5') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
			<div class="col-sm-8">
				{{ Form::checkbox('ntv_chopheptimkiem', 1, 1) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Hồ sơ mặc định:</label>
			<div class="col-sm-6">
				{{ Form::checkbox('ntv_hosomacdinh', 1, 1) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('status', array(0=>'Đang chờ duyệt', 1=>'Đã duyệt'), 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</div>
	{{ Form::close() }}
@stop

