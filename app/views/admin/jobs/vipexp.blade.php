@extends('layouts.admin')
@section('title')VIP Jobs Manager @stop
@section('page-header')Danh sách tin VIP sắp hết hạn @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	
	<table class="table table-hover table-bordered table-striped" id="jobs">
		<thead>
			<tr>
				<th>ID</th>
				<th>NTD</th>
				<th>Mã tin</th>
				<th>Vị trí</th>
				<th>Hiển thị</th>
				<th>Hạn nộp</th>
				<th>Trạng thái</th>
				<th>VIP đến</th>
			</tr>
		</thead>
		<tbody>
			@if(count($jobs))
				@foreach($jobs as $job)
					<tr>
						<td>{{ $job->id }}</td>
						<td>{{ HTML::link(URL::route('admin.employers.edit', [$job->ntd_id]), ($job->ntd->company->company_name)?$job->ntd->company->company_name:$job->ntd->email) }}</td>
						<td>{{ $job->matin }}</td>
						<td>{{ HTML::link(URL::route('admin.jobs.edit', [$job->id]), $job->vitri ) }}</td>
						<td>@if($job->is_display==1)
						<span class="label label-success">Hiển thị</span>
						@else
						<span class="label label-warning">Đang ẩn</span>
						@endif</td>
						<td>{{ $job->hannop }}</td>
						<td id="td_status_{{ $job->id }}">
							@if($job->status == 1)
							<span id="lstatus_{{ $job->id }}" class="label label-status label-primary">Đã duyệt</span>
							@elseif($job->status == 2)
							<span id="lstatus_{{ $job->id }}" class="label label-status label-warning">Chưa được duyệt</span>
							@else 
							<span id="lstatus_{{ $job->id }}" class="label label-status label-danger">Từ chối</span>
							@endif
						</td>
						<td>{{ $job->vip_to }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="9">Không có VIP sắp hết hạn</td>
				</tr>
			@endif
		</tbody>
	</table>
	<div id="pagination">
		{{ $jobs->links() }}
	</div>
@stop
