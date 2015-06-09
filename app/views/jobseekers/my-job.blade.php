@extends('layouts.jobseeker')
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			{{Form::open(array('action'=>array('JobSeeker@delMyJob'), 'method'=>'POST', 'id'=>'DelSavedJob'))}}
			<div class="rows">
				<div class="title-page">
					<h2>Việc làm của tôi</h2>
				</div>
					<p><strong>Lưu ý</strong>: Bạn không xem được việc làm đã hết thời hạn đăng tuyển hoặc tạm ngưng nhận hồ sơ.
            		</p>
					<p>
								<a id="a_selectall" class="text-blue decoration" >Chọn tất cả</a> | 
								<a id="a_deselectall" class="text-orange decoration">Bỏ chọn tất cả</a>
							</p>
							<p><strong>Với việc làm đã chọn:</strong></p>
							<p class="clearfix">
								{{Form::submit('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
							</p>
					<table class="table table-striped table-hover table-bordered">
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
									@if($my_job_list !=null)
									@foreach($my_job_list as $mjl)
									<tr>
										<td>{{Form::checkbox('check[]', $mjl->id, null, array('class'=>'checkbox'))}}</td>
										<td>
											<strong><em>{{ HTML::linkRoute('jobseekers.job', $mjl->jobs->vitri, array($mjl->jobs->slug, "$mjl->job_id"), array('class' => 'text-blue'))}}</em></strong>
											<small><div class="legend text-orange">
												@if(strtotime($mjl->jobs->expired_date) < strtotime(date('Y-m-d', time())))
													Hết hạn
												@endif
											</div></small>
											<button type="button" class="btn bg-gray-light btn-sm">Thêm ghi chú</button>
										</td>
										<td>{{$mjl->jobs->ntd->company->company_name}}</td>
										<td>{{$mjl->save_date}}</td>
										<td>{{$mjl->respond}}</td>
										<td>
											@if(count($mjl->application) > 0)
												Đã ứng tuyển<br>({{date('d-m-Y',strtotime($mjl->application->apply_date))}})
											@else
												{{ HTML::linkRoute('jobseekers.job', 'Ứng tuyển', array($mjl->jobs->slug, "$mjl->job_id"), array('class' => 'btn btn-sm bg-orange btn-apply'))}}
											@endif
										</td>
									</tr>
									@endforeach
									@else
										<tr>
											<td rowspan="6">Chưa có việc làm nào</td>
										</tr>
									@endif
								</tbody>
							</table>
							@if($my_job_list !=null)
							<nav class="navbar-right pagination-sm">
								{{$my_job_list->links()}}
							</nav>
							@endif
							
							<p>
								<a id="a_selectall" class="text-blue decoration" >Chọn tất cả</a> | 
								<a id="a_deselectall" class="text-orange decoration">Bỏ chọn tất cả</a>
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

