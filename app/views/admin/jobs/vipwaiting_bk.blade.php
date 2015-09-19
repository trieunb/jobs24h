@extends('layouts.admin')
@section('title')Waiting VIP Jobs Manager @stop
@section('page-header')Danh sách tin VIP cần duyệt @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	
	
	<form action="{{ URL::route('admin.jobs.vipwaiting') }}" method="GET" class="form" role="form" id="search">
	<div class="col-sm-12">
			<div class="col-sm-8">
				{{ Form::text('q',null, array('class'=>'form-control', 'placeholder'=>'Nhập tìm kiếm ', 'id'=>'search_input') ) }}
			</div>
			<div class="col-sm-4">
				<button type="submit" class="btn btn-sm btn-primary" id="search">Tìm kiếm</button>
			</div>
	</div>
	</form>
		
	<div class="clearfix"></div>
	<div class="col-sm-12">
		<form action="" method="POST" class="form-inline" role="form">
			
		
		<div class="col-sm-12">
		<table class="table table-hover table-bordered table-striped" id="jobs">
			<thead>
				<tr>
					<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
					<th>Tin tuyển dụng</th>
					<th>Nhà tuyển dụng</th>
					<th>Cập nhật</th>
					<th>Hết hạn nộp</th>
					<th>Trạng thái</th>
					<th>Dịch vụ</th>
					<th>Ghi Chú</th>
					<th>CSKH</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@if(count($jobs))
					<?php $now=date('Y-m-d H:i:s'); ?>
					@foreach($jobs as $job)

						 
						<tr>
							<td id="td_checkbox_{{ $job->id }}">
								<label class="pos-rel">
									<input type="checkbox" name="jobids[]" value="{{ $job->id }}" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>{{ HTML::link(URL::route('admin.jobs.edit1', [0,$job->id]), $job->vitri ) }}</td>
							<td>{{ HTML::link(URL::route('admin.employers.edit1', [0,$job->ntd_id]), ($job->ntd->company->company_name)?$job->ntd->company->company_name:$job->ntd->email) }}</td>
							<td>{{ date('m-d-y', strtotime($job->updated_at)) }}</td>
							<td>{{ date('m-d-y', strtotime($job->hannop)) }}</td>
							<td>@if($job->is_display==1)
								<span class="label label-success">Hiển thị</span>
							@else
								<span class="label label-warning">Đang ẩn</span>
							@endif</td>
								

							<td>
							@foreach($job->orderpostrec as $val)

							  	@if((strtotime(date('Y-m-d H:i:s',strtotime($val->ended_date)))-strtotime($now))/(60*60*24)< 7 && (strtotime(date('Y-m-d H:i:s',strtotime($val->ended_date)))-strtotime($now))/(60*60*24)>0 )
									<p style="color:orange ">{{$val->epackage_name}} : {{date('d-m-Y H:i:s',strtotime($val->ended_date))}}  </p>
								@elseif((strtotime(date('Y-m-d H:i:s',strtotime($val->ended_date)))-strtotime($now))/(60*60*24)<= 0)
									<p style="color:red ">{{$val->epackage_name}} : {{date('d-m-Y H:i:s',strtotime($val->ended_date))}} </p>
								@else
									<p>{{$val->epackage_name}} : {{date('d-m-Y H:i:s',strtotime($val->ended_date))}} </p>
								@endif 
									
								
							@endforeach

							</td>

								<td>Cam là sắp hết hạn<br> Đỏ là đã hết hạn</td>
								<td>{{AdminAuth::getUser()->username}}</td>

							<td id="">
								<button type="button" value="1" id="" class="btn btn-xs btn-duyet btn-primary">Xóa</button>
								<button type="button" value="3" id="" class="btn btn-xs btn-duyet btn-danger">Gia Hạn</button>
							</td>
						</tr>
						 
					@endforeach
				@else
					<tr>
						<td colspan="9">Không có tin cần duyệt</td>
					</tr>
				@endif
			</tbody>
		</table>
		</div>
		</form>
	</div>
	<div id="pagination">
		{{ $pagination }}
	</div>
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


@foreach($note as $no)
	@if((strtotime(date("d-m-Y H:i:s",strtotime($no)))-strtotime(date("d-m-Y H:i:s")))/(60*60*24) < 7 && (strtotime(date("d-m-Y H:i:s",strtotime($no)))-strtotime(date("d-m-Y H:i:s")))/(60*60*24)>0)
				 <span style="color:orange"> Có dịch vụ gần hết hạn </span> 
				@elseif((strtotime(date("d-m-Y H:i:s",strtotime($no)))-strtotime(date("d-m-Y H:i:s")))/(60*60*24) < 0) 
					<span style="color:red"> Có dịch vụ hết hạn </span>
				@else
				fdsfds
	@endif 
				 
@endforeach
