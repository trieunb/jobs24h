@extends('layouts.jobseeker')
@section('title') Quản lý việc làm đã lưu @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			{{Form::open(array('route'=>array('jobseekers.post-del-my-job'), 'method'=>'POST', 'id'=>'DelSavedJob'))}}
			<div class="rows">
				<div class="title-page">
					<h2>Việc làm đã lưu</h2>
				</div>
					<p><strong>Lưu ý</strong>: Bạn không xem được việc làm đã hết thời hạn đăng tuyển hoặc tạm ngưng nhận hồ sơ.
            		</p>
					<!-- <p>
						<a id="a_selectall" class="text-blue decoration" >Chọn tất cả</a> | 
						<a id="a_deselectall" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với việc làm đã chọn:</strong></p>
					<p class="clearfix">
						{{Form::submit('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
					</p> -->
					<table class="table table-striped table-hover table-bordered rs-table">
								<thead>
									<tr>
										<th>{{Form::checkbox('', null,null, array('id'=>'selectall'))}}</th>
										<th class="col-sm-5">Chức danh</th>
										<th>Công ty</th>
										<th>Ngày lưu</th>
										<th>Nhà tuyển dụng phản hồi</th>
										<th>Tình trạng</th>
									</tr>
								</thead>
								<tbody>
									@if(isset($my_job_list) && count($my_job_list))
									@foreach($my_job_list as $mjl)
									<tr>
										<td>
											{{Form::checkbox('check[]', $mjl->id, null, array('class'=>'checkbox'))}}
										</td>
										<td>
											<strong><em>{{ HTML::linkRoute('jobseekers.job', $mjl->jobs->vitri, array($mjl->jobs->slug, "$mjl->job_id"), array('class' => 'text-blue'))}}</em></strong>
											<small><div class="legend text-orange">
												@if(strtotime($mjl->jobs->hannop) < strtotime(date('Y-m-d', time())))
													Hết hạn
												@endif
											</div></small>
											<button type="button" class="btn bg-gray-light btn-sm add-note" data-toggle="popover" data-placement="bottom" data-content='<div class="form-horizontal" id="note"><div class="form-group"><textarea rows="3" name="note" class="form-control note" placeholder="Ghi chú">{{$mjl->note}}</textarea></div><div class="form-group"><input type="hidden" name="id" class="form-control id" value="{{$mjl->id}}"><button type="button" class="btn btn-sm save-note bg-orange pull-right">Lưu</button></div></div>'>Thêm ghi chú</button>
										</td>
										<td><a href="{{URL::route('company.view', $mjl->jobs->ntd->company->id)}}">{{$mjl->jobs->ntd->company->company_name}}</a></td>
										<td>{{$mjl->save_date}}</td>
										<td>{{$mjl->respond}}</td>
										<td>
											@if(count($applied_job))
											@foreach($applied_job as $val)
												@if($val->job_id == $mjl->job_id)
												Đã ứng tuyển<br>({{date('d-m-Y',strtotime($val->apply_date))}})
												@else
												{{ HTML::linkRoute('jobseekers.job', 'Ứng tuyển', array($mjl->jobs->slug, "$mjl->job_id"), array('class' => 'btn btn-sm bg-orange btn-apply'))}}
												@endif
											@endforeach
											@endif
										</td>
									</tr>
									@endforeach
									@else
										<tr>
											<td colspan="6" class="text-align-center">Không có việc làm nào đã lưu, hãy bắt đầu <a class="text-blue decoration" href="{{URL::route('jobseekers.search-job')}}">tìm kiếm</a> ngay bây giờ để tìm được công việc phù hợp.</td>
										</tr>
									@endif
								</tbody>
							</table>
							@if(isset($my_job_list) && count($my_job_list))
							<nav class="navbar-right pagination-sm">
								{{$my_job_list->links()}}
							</nav>
							@endif
							<p>
								<a id="a_selectall_u" class="text-blue decoration" >Chọn tất cả</a> | 
								<a id="a_deselectall_u" class="text-orange decoration">Bỏ chọn tất cả</a>
							</p>
							<p><strong>Với việc làm đã chọn:</strong></p>
							<p class="clearfix">
								{{Form::submit('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
							</p>
					
			</div>
			{{Form::close()}}
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop
@section('scripts')
	<script type="text/javascript">
	$(document).on('click', '.save-note', function(event) {
		
		event.preventDefault();
		var url = '{{ URL::action("JobSeeker@saveNote") }}';
		var parent_name = $(this).parents('#note').attr('id');
		$.ajax({
			url: url,
			type: 'POST',
			data: {note: $('#'+parent_name+ ' .note').val(),
					id: $('#'+parent_name+ ' .id').val()},
			success : function(data){
				location.reload();
			}
		});
	});
	</script>
@stop

