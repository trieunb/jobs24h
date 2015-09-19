@extends('layouts.admin')
@section('title')Waiting Jobs Manager @stop
@section('page-header')Danh sách tin đăng cần duyệt @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="col-sm-12 infobox-container">
		<div class="infobox infobox-green">
			<div class="infobox-icon">
				
				<i class="ace-icon fa fa-bank"></i>
			</div>

			<div class="infobox-data">
				 <a href="{{URL::route('admin.jobs.waiting')}}">
					<div class="infobox-content">Tổng số tin chưa duyệt</div>
					<span class="infobox-data-number">{{ $jobs->count() }}</span>
				 </a>
			</div>

			<!-- <div class="stat stat-success">8%</div> -->
		</div>
	</div>

	<form action="" method="POST" class="form-inline" role="form">
	
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="jobs">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<!-- <th>ID</th> -->
				<th>Tin tuyển dụng</th>
				<th>Nhà tuyển dụng</th>
				<!-- <th>Mã tin</th> -->
				<th>Cập nhật</th>
				<th>Hạn nộp</th>
				<th>Tình trạng đăng</th>
				<th>Trạng thái</th>
				<th>Hành động</th>
				<th>CSKH</th>	
			</tr>
		</thead>
		<tbody>
			@if(count($jobs))
				@foreach($jobs as $job)
					<tr>
						<td id="td_checkbox_{{ $job->id }}">
							<label class="pos-rel">
								<input type="checkbox" name="jobids[]" value="{{ $job->id }}" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						
						<!-- <td>{{ $job->id }}</td> -->
						<td>{{ HTML::link(URL::route('admin.jobs.edit1', [0,$job->id]), $job->vitri ) }}</td>
						<td>{{ HTML::link(URL::route('admin.employers.edit1', [0,$job->ntd_id]), ($job->ntd->company->company_name)?$job->ntd->company->company_name:$job->ntd->email) }}</td>
						<!-- <td>{{ $job->matin }}</td> -->
						<td>{{ date('d-m-Y',strtotime($job->hannop)) }}</td>
						<td>{{ date('d-m-Y',strtotime($job->created_at)) }}</td>
						<td>@if($job->is_display==1)
						<span class="label label-success">Đăng ngay</span>
						@else
						<span class="label label-warning">Chờ đăng</span>
						@endif</td>

						<td id="td_status_{{ $job->id }}">
							@if($job->status == 1)
							<span id="lstatus_{{ $job->id }}" class="label label-status label-primary">Đã duyệt</span>
							@elseif($job->status == 2)
							<span id="lstatus_{{ $job->id }}" class="label label-status label-warning">Chưa được duyệt</span>
							@else 
							<span id="lstatus_{{ $job->id }}" class="label label-status label-danger">Từ chối</span>
							@endif
						</td>
						<td id="td_duyet_{{ $job->id }}">
							<button type="button" value="1" id="duyet_{{ $job->id }}" class="btn btn-xs btn-duyet btn-primary">Duyệt</button>
							<button type="button" value="3" id="duyet_{{ $job->id }}" class="btn btn-xs btn-duyet btn-danger">Từ chối</button>
						</td>
						<td>{{AdminAuth::getUser()->username}}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="9">Không có tin cần duyệt</td>
				</tr>
			@endif
		</tbody>
	</table>

	
	
	<div id="pagination" style="float:right">
		{{ $jobs->links() }}
	</div>
	<div class="row">
			<div class="form-group">
				<div class="col-sm-2">
					<select name="action" id="inputAction" class="form-control" required="required">
						<option value=""></option>
						<option value="accept">Duyệt tin</option>
						<option value="deni">Từ chối</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-sm btn-primary">Thực hiện</button>
		</div>
	</form>
@stop

@section('script')
	<script type="text/javascript">
	$('.btn-duyet').click(function(event) {
		var thisId = this.id;
		var jobid = thisId.split('_');
		var status = $(this).val();
		jobid = jobid[1];
		$.ajax({
			url: '{{ URL::route('admin.jobs.ajax') }}',
			type: 'POST',
			data: {action: 'accept_job', jobid: jobid, status: status},
			success: function(json)
			{
				$('#td_status_'+jobid).html('<span class="label label-primary">Đã duyệt</span>');
				$('#td_duyet_'+jobid).html('&nbsp;');
				$('#td_checkbox_'+jobid).html('&nbsp;');
			}
		})
	});

	$('#jobs > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
		var th_checked = this.checked;//checkbox inside "TH" table header
		
		$(this).closest('table').find('tbody > tr').each(function(){
			var row = this;
			if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
		});
	});
		var active_class = 'success';
		$('#jobs').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
	</script>
@stop