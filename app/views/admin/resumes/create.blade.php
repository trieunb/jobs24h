@extends('layouts.admin')
@section('title')Add new Resume @stop
@section('content')
	<h3>Thêm mới CV: </h3>
	<hr>
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.resumes.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-8">
				{{ Form::email('email', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tiêu đề CV:</label>
			<div class="col-sm-8">
				{{ Form::text('tieude_cv', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mục tiêu NN:</label>
			<div class="col-sm-8">
				{{ Form::textarea('dinhhuongnn', null, array('class'=>'form-control', 'rows'=>'5') ) }}
			</div>
		</div>
		
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
				{{ Form::select('ntv_noilamviec', Province::lists('province_name', 'id'), null, array('multiple'=>'multiple', 'class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Nơi làm việc:</label>
			<div class="col-sm-8">
				{{ Form::select('ntv_nganhnghe', Category::lists('cat_name', 'id'), null, array('multiple'=>'multiple', 'class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Mức lương mong muốn:</label>
			<div class="col-sm-2">
				{{ Form::input('number', 'ntv_mucluongmongmuon', '0', array('class'=>'form-control', 'min'=>0, 'max'=>10000, 'step'=>50) ) }}
			</div>
			<div class="col-xs-1">
				{{ Form::select('loaitien', array(1=>'USD', 2=>'VND'), 1, array('class'=>'form-control') ) }}
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
			<label for="input" class="col-sm-2 control-label">Kỹ năng:</label>
			<div class="col-sm-8">
				{{ Form::textarea('kynang', null, array('class'=>'form-control', 'rows'=>'5') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Đánh giá bản thân:</label>
			<div class="col-sm-8">
				{{ Form::textarea('danhgiabanthan', null, array('class'=>'form-control', 'rows'=>'5') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Cho phép tìm kiếm:</label>
			<div class="col-sm-8">
				{{ Form::checkbox('is_public', 1, 1) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Hồ sơ mặc định:</label>
			<div class="col-sm-6">
				{{ Form::checkbox('is_default', 1, 1) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('trangthai', array(0=>'Đang chờ duyệt', 1=>'Đã duyệt'), 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</div>
	{{ Form::close() }}
@stop

