@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		<div class="col-sm-8">
			@include('includes.jobseekers.breadcrumb')
		</div>
		<div class="user-menu col-sm-4 pull-right">
			<a href="#" class="text-blue">
				<img src="assets/images/ruibu.jpg" class="avatar">
				<strong><em>Hi, David</em></strong>
			</a>
			<nav class="ntv-menu navbar-right">
				@include('includes.jobseekers.menu-ntv')
			</nav>
		</div>
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
				<div class="title-page">
					<h2>Việc Làm Gợi Ý</h2>
				</div>
				<div id="searchresult">
				<ul>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>$3000</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/floppy-copy.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/search-job.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/email-job.png"></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>$3000</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/floppy-copy.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/search-job.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/email-job.png"></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
					</ul>
				</div>
				<a href="#" class="pull-right push-top"><strong>Xem tất cả việc làm tương tự</strong></a>
			</div>
		</div>
	</section>
@stop

