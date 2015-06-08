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
			{{Form::open(array('action'=>array('JobSeeker@delMyJob'), 'method'=>'POST', 'id'=>'DelSavedJob'))}}
			<div class="rows">
				<div class="title-page">
					<h2>Việc làm của tôi</h2>
				</div>
					<p><strong>Lưu ý</strong>: Bạn không xem được việc làm đã hết thời hạn đăng tuyển hoặc tạm ngưng nhận hồ sơ.
            		</p>
					<p>
						<a href="#" class="text-blue decoration">Chọn tất cả</a> | 
						<a href="#" class="text-orange decoration">Bỏ chọn tất cả</a>
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
						<a href="#" class="text-blue decoration">Chọn tất cả</a> | 
						<a href="#" class="text-orange decoration">Bỏ chọn tất cả</a>
					</p>
					<p><strong>Với việc làm đã chọn:</strong></p>
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

