@extends('layouts.admin')
@section('title')Resumes Manager @stop
@section('page-header')Danh sách hồ sơ @stop
@section('content')
	@include('includes.notifications')
	<table class="table table-hover table-bordered table-striped" id="resumes">
		<thead>
			<tr>
				<!--<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>-->
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
					<!--<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>-->
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