@extends('layouts.jobseeker')
@section('title') Phản hồi từ Nhà tuyển dụng - VnJobs @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Phản hồi của nhà tuyển dụng</h2>
				</div>
					<p>
						<a href="#" class="text-blue decoration">Chọn tất cả</a> | 
						<a href="#" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với phản hồi được chọn:</strong></p>
					<p class="clearfix">
						{{Form::button('Xóa', array('class'=>'btn-delete btn bg-orange btn-lg'))}}
					</p>
					<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th><input type="checkbox" value=""></th>
										<th class="col-sm-3">Chủ đề</th>
										<th class="col-sm-3">Công ty</th>
										<th class="col-sm-4">Nội dung</th>
										<th class="col-sm-2">Ngày nhận</th>
									</tr>
								</thead>
								<tbody>
									@if($my_job_list != null)
									@foreach($my_job_list as $mjl)
									@if($mjl->respond != null)
									<tr>
										<td><input type="checkbox" value=""></td>
										<td><strong><em>{{ HTML::linkRoute('jobseekers.job', $mjl->jobs->vitri, array($mjl->jobs->slug, "$mjl->job_id"), array('class' => 'text-blue'))}}</em></strong></td>
										<td>{{$mjl->jobs->ntd->company->company_name}}</td>
										<td>{{$mjl->respond}}</td>
										<td>{{$mjl->updated_at}}</td>
									</tr>
									@endif
									@endforeach
									@endif
								</tbody>
							</table>
							@if($my_job_list !=null)
							<nav class="navbar-right pagination-sm">
								{{$my_job_list->links()}}
							</nav>
							@endif
					<p>
						<a href="#" class="text-blue decoration">Chọn tất cả</a> | 
						<a href="#" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với phản hồi được chọn:</strong></p>
					<p class="clearfix">
						<button type="button" class="btn bg-orange btn-lg">Xóa</button>
					</p>
					
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop

