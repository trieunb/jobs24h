@extends('layouts.admin')
@section('title')Resumes Manager @stop
@section('page-header')Danh sách hồ sơ @stop
@section('content')
	@include('includes.notifications')
	<!--<a href="{{ URL::route('admin.resumes.create') }}" class="btn btn-success pull-right">Thêm mới</a>-->
	<div class="clearfix"></div>
	{{ Form::open( array('method'=>'GET', 'class'=>'form-horizontal') ) }}
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Email:</label>
				<div class="col-sm-9">
					{{ Form::text('email', Input::get('email'), array('class'=>'form-control', 'placeholder'=>'Nhập Email', 'id'=>'email') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">HọTên:</label>
				<div class="col-sm-9">
					{{ Form::text('full_name', Input::get('full_name'), array('class'=>'form-control', 'placeholder'=>'Nhập Họ tên', 'id'=>'full_name') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">SốĐT:</label>
				<div class="col-sm-9">
					{{ Form::text('phone_number', Input::get('phone_number'), array('class'=>'form-control', 'placeholder'=>'Nhập Số điện thoại', 'id'=>'phone_number') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Bậc lương:</label>
				<div class="col-sm-9">
					{{ Form::select('salary', array('all'=>'Tất cả', 0=>'Thỏa thuận', 1=>'Mức cụ thể'), Input::get('salary'), array('class'=>'form-control', 'id'=>'salary') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Trạng thái:</label>
				<div class="col-sm-9">
					{{ Form::select('status', array('all'=>'Tất cả', 1=>'Hồ sơ chính', 0=>'Hồ sơ phụ'), Input::get('status'), array('class'=>'form-control', 'id'=>'status') ) }}
				</div>
			</div>
			
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Giới tính:</label>
				<div class="col-sm-9">
					{{ Form::select('gender', array('all'=>'Tất cả', 1=>'Nam', 2=>'Nữ', 3=>'Không tiết lộ'), Input::get('gender'), array('class'=>'form-control', 'id'=>'gender') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Ngày sinh:</label>
				<div class="col-sm-9">
					{{ Form::text('date_of_birth', Input::get('date_of_birth'), array('class'=>'form-control', 'placeholder'=>'Nhập ngày sinh', 'id'=>'date_of_birth') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Năm KN:</label>
				<div class="col-sm-9">
					{{ Form::text('namkinhnghiem', Input::get('namkinhnghiem'), array('class'=>'form-control', 'placeholder'=>'Nhập năm kinh nghiệm', 'id'=>'namkinhnghiem') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Nơi LV:</label>
				<div class="col-sm-9">
					{{ Form::select('work_location', array('all'=>'Tất cả')+Province::lists('province_name', 'id'), Input::get('work_location'), array('class'=>'form-control', 'id'=>'work_location') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Hôn Nhân:</label>
				<div class="col-sm-9">
					{{ Form::select('marital_status', array('all'=>'Tất cả', 1=>'Đã lập gia đình', 2=>'Độc thân'), Input::get('marital_status'), array('class'=>'form-control', 'id'=>'marital_status') ) }}
				</div>
			</div>
			
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">BằngCấp:</label>
				<div class="col-sm-9">
					{{ Form::select('education', array('all'=>'Tất cả')+Education::lists('name', 'id'), Input::get('education'), array('class'=>'form-control', 'id'=>'education') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Cấp bậc:</label>
				<div class="col-sm-9">
					{{ Form::select('level', array('all'=>'Tất cả')+Level::lists('name', 'id'), Input::get('level'), array('class'=>'form-control', 'id'=>'level') ) }}
				</div>
			</div>
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">Ngành:</label>
				<div class="col-sm-9">
					{{ Form::select('category', array('all'=>'Tất cả')+Category::where('parent_id','>',0)->lists('cat_name', 'id'), Input::get('category'), array('class'=>'form-control', 'id'=>'category') ) }}
				</div>
			</div>
			
			<div class="form-group">
				<label for="input" class="col-sm-3 control-label">NgoạiNgữ:</label>
				<div class="col-sm-9">
					{{ Form::select('language', array('all'=>'Tất cả')+Language::lists('lang_name', 'id'), Input::get('language'), array('class'=>'form-control', 'id'=>'language') ) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" name="submit" class="btn btn-xs btn-warning"><i class="fa fa-search"></i> Tìm</button>
					<button type="button" class="btn btn-xs btn-danger" id="btn-reset"><i class="fa fa-close"></i> Reset</button>
				</div>
			</div>
		</div>
			
	{{ Form::close() }}
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
				<th>Trạng thái</th>
				<th>Ngày sinh</th>
				<th>Nơi LV</th>
				<th>Ngành Nghề</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($resumes as $key => $resume)
				<tr>
					<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>
					<td>{{ $resume->id }}</td>
					<td><a href="{{ URL::route('admin.jobseekers.edit', $resume->ntv['id']) }}">{{ $resume->ntv['email'] }}</a></td>
					<td>{{ $resume->ntv['first_name'] }} {{ $resume->ntv['last_name'] }}</td>
					<td>
						@if($resume->trangthai == 1)
							<span class="label label-success">Đã duyệt</span>
						@elseif($resume->trangthai == 2)
							<span class="label label-warning">Đang chờ duyệt</span>
						@else
							<span class="label label-info">Chưa hoàn thiện</span>
						@endif
					</td>
					<td>{{ $resume->ntv['date_of_birth'] }}</td>
					<td>
						@foreach ($resume->location as $location)
							@if($location->province['province_name'] != '')
							{{$location->province['province_name']}}<br>
							@endif
						@endforeach
					</td>
					<td>
						@foreach ($resume->cvcategory as $cat)
							@if($cat->category['cat_name'] != '')
							{{ $cat->category['cat_name'] }}<br>
							@endif
						@endforeach

					</td>
					
					<td>
						{{ Form::open( array('route'=> array('admin.resumes.destroy', $resume->id), 'method'=>'DELETE' ) ) }}
						<a href="{{ URL::route('admin.resumes.show', $resume->id) }}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-search"></i> IN</a>
						<a href="{{ URL::route('admin.resumes.edit', $resume->id) }}" class="btn btn-xs btn-info"><i class="fa fa-search"></i></i> SỬA</a>
						{{ Form::button('<i class="fa fa-remove"></i></i> XÓA', array('type'=>'submit', 'class'=>'btn btn-xs btn-danger', 'onclick'=>'return confirm("Bạn có chắc muốn xóa ?");')) }}
						
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div id="pagination">
		{{ $resumes->links() }}
	</div>
@stop


@section('script')
	<script>
		var active_class = 'success';
		$('#resumes > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});

		$('#resumes').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
		$('#btn-reset').click(function(event) {
			$('input.form-control').each(function(index, el) {
				$(this).val('');
			});
			$('select.form-control').each(function(index, el) {
				$(this).val('all');
			});
		});

	</script>

@stop