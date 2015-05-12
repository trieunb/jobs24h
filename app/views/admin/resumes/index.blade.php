@extends('layouts.admin')
@section('title')Resumes Manager @stop
@section('content')
	<h2>Danh sách hồ sơ</h2>
	<hr>
	@include('includes.notifications')
	<!--<a href="{{ URL::route('admin.resumes.create') }}" class="btn btn-success pull-right">Thêm mới</a>-->
	<div class="clearfix"></div>
	<form action="" method="POST" class="form-horizontal" role="form">
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Email:</label>
				<div class="col-sm-9">
					{{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Nhập Email', 'id'=>'email') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">HọTên:</label>
				<div class="col-sm-9">
					{{ Form::text('full_name', null, array('class'=>'form-control', 'placeholder'=>'Nhập Họ tên', 'id'=>'full_name') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">SốĐT:</label>
				<div class="col-sm-9">
					{{ Form::text('phone_number', null, array('class'=>'form-control', 'placeholder'=>'Nhập Số điện thoại', 'id'=>'phone_number') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Bậc lương:</label>
				<div class="col-sm-9">
					{{ Form::select('salary', array('all'=>'Tất cả', 0=>'Thỏa thuận', 1=>'Mức cụ thể'), 'all', array('class'=>'form-control', 'id'=>'salary') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Trạng thái:</label>
				<div class="col-sm-9">
					{{ Form::select('status', array('all'=>'Tất cả', 1=>'Hồ sơ chính', 0=>'Hồ sơ phụ'), 'all', array('class'=>'form-control', 'id'=>'status') ) }}
				</div>
			</div>
			
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Giới tính:</label>
				<div class="col-sm-9">
					{{ Form::select('gender', array('all'=>'Tất cả', 1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ'), 'all', array('class'=>'form-control', 'id'=>'gender') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Ngày sinh:</label>
				<div class="col-sm-9">
					{{ Form::text('date_of_birth', null, array('class'=>'form-control', 'placeholder'=>'Nhập ngày sinh', 'id'=>'date_of_birth') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Năm KN:</label>
				<div class="col-sm-9">
					{{ Form::text('namkinhnghiem', null, array('class'=>'form-control', 'placeholder'=>'Nhập năm kinh nghiệm', 'id'=>'namkinhnghiem') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Nơi LV:</label>
				<div class="col-sm-9">
					{{ Form::select('work_location', array('all'=>'Tất cả')+Province::lists('province_name', 'id'), null, array('class'=>'form-control', 'id'=>'work_location') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Hôn Nhân:</label>
				<div class="col-sm-9">
					{{ Form::select('marital_status', array('all'=>'Tất cả', 1=>'Đã lập gia đình', 2=>'Độc thân'), 'all', array('class'=>'form-control', 'id'=>'marital_status') ) }}
				</div>
			</div>
			
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">BằngCấp:</label>
				<div class="col-sm-9">
					{{ Form::select('education', array('all'=>'Tất cả')+Education::lists('name', 'id'), null, array('class'=>'form-control', 'id'=>'education') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Cấp bậc:</label>
				<div class="col-sm-9">
					{{ Form::select('level', array('all'=>'Tất cả')+Level::lists('name', 'id'), null, array('class'=>'form-control', 'id'=>'level') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Ngành:</label>
				<div class="col-sm-9">
					{{ Form::select('category', array('all'=>'Tất cả')+Category::where('parent_id','>',0)->lists('cat_name', 'id'), null, array('class'=>'form-control', 'id'=>'category') ) }}
				</div>
			</div>
			
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">NgoạiNgữ:</label>
				<div class="col-sm-9">
					{{ Form::select('language', array('all'=>'Tất cả')+Language::lists('lang_name', 'id'), null, array('class'=>'form-control', 'id'=>'language') ) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-search"></i> Tìm</button>
					<button type="button" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Reset</button>
				</div>
			</div>
		</div>
			
	</form>
	<table class="table table-hover table-bordered table-striped" id="resumes">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Email</th>
				<th>Họ tên</th>
				<th>Số ĐT</th>
				<th>Trạng thái</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
@stop


@section('script')
	

@stop