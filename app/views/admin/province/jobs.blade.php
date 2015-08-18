@extends('layouts.admin')
@section('title')Jobs Manager @stop
@section('page-header')Danh sách tin tuyển dụng @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="jobs">
		<thead>
			<tr>
				<!--<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>-->
				<th>ID</th>
				<th>NTD</th>
				<th>Mã tin</th>
				<th>Vị trí</th>
				<th>Hiển thị</th>
				<th>Hạn nộp</th>
				<th>Trạng thái</th>
				<th>Lượt xem</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
				<tr>
					<!--<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>-->
					<td>{{$job->id}}</td>
					<td><a href="{{URL::action('EmployerController@edit', $job->ntd->id)}}" target="_blank">{{$job->ntd->email}}</a></td>
					<td>{{$job->matin}}</td>
					<td><a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}" target="_blank">{{$job->vitri}}</a></td>
					<td>@if($job->is_display == 1)
						<span class="label label-success">Đang hiển thị</span>
						@else
						<span class="label label-warning">Ẩn</span>
						@endif
					</td>
					<td>{{$job->hannop}}</td>
					<td>@if($job->status == 1)
						<span class="label label-success">Đã duyệt</span>
						@else
						<span class="label label-warning">Đang chờ duyệt</span>
						@endif
					</td>
					<td>{{$job->luotxem}}</td>
					<td>
						{{ Form::open( array('route'=> array('admin.jobs.destroy', $job->id), 'method'=>'DELETE' ) ) }}
						<a href="{{ URL::route('admin.jobs.edit', $job->id) }}" class="btn btn-xs btn-info"><i class="fa fa-search"></i></i> SỬA</a>
						{{ Form::button('<i class="fa fa-remove"></i></i> XÓA', array('type'=>'submit', 'class'=>'btn btn-xs btn-danger', 'onclick'=>'return confirm("Bạn có chắc muốn xóa ?");')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('script')
	<script>
		var active_class = 'success';
		$('#jobs > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});

		$('#jobs').on('click', 'td input[type=checkbox]' , function(){
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