@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
			<div class="boxed">
				<div class="details">
					<div class="top">
						<h1>{{$job->vitri}}</h1>	
						<h2>{{$job->ntd->company->company_name}}</h2>
						<a href="{{URL::route('jobseekers.applying-job', array($job->id))}}" class="btn btn-lg bg-orange">Nộp đơn</a>
					</div>
					<div class="clearfix link-list">
						<i class="fa fa-bookmark"></i>
						<a href="{{URL::route('jobseekers.save-job', array($job->id))}}">Lưu việc làm này</a>
						<i class="fa fa-envelope"></i>
						<a class="get-job-by-tags">Gởi email việc làm tương tự</a>
						<i class="fa fa-share"></i>
						<strong><a class="share-to-friends">Giới thiệu bạn bè</a></strong>
					</div>
					<h2>Mô Tả Công Việc</h2>
					<div class="job-description">
						{{$job->mota}}
					</div>
					<h2>Yêu cầu công việc</h2>
					<div class="job-requirement">
						{{$job->yeucaukhac}}
					</div>
					<h2>Quyền lợi</h2>
					<div class="job-requirement">
						{{$job->quyenloi}}
					</div>
				</div>
			</div>
			<div class="boxed">
				<div class="rows">
				<div class="title-page">
					<h2>Thông tin vị trí tuyển dụng</h2> 
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>Job Level</td>
							<td>{{$job->chucvu}}</td>
						</tr>
						<tr>
							<td>Salary</td>
							<td>{{$job->mucluong_min}}-{{$job->mucluong_max}}</td>
						</tr>
						<tr>
							<td>Industry</td>
							<td>
								@foreach($job->category as $key=>$val)
									{{$job->category[$key]->category->cat_name}}<br>
								@endforeach
							</td>
						</tr>
						<tr>
							<td>Location</td>
							<td>
								@foreach($job->province as $key=>$val)
									{{$job->province[$key]->province->province_name}}<br>
								@endforeach
							</td>
						</tr>
						<tr>
							<td>Job Type</td>
							<td>{{$job->work->name}}</td>
						</tr>
						<tr>
							<td>Posted</td>
							<td>10 Apr 2015</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			<div class="boxed">
				<div class="rows">
				<div class="title-page">
					<h2>Thông tin công ty</h2> 
				</div>
				<div class="company-info">
					<h3 class="text-orange">{{$job->ntd->company->company_name}}</h3>
					<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{$job->ntd->company->company_address}}.</span>
					<span><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact person: {{$job->nguoilienhe}}.</span>
					<span><i class="fa fa-user"></i>&nbsp;&nbsp;Company size: {{$job->ntd->company->total_staff}}.</span>
					<div class="jcarousel-wrapper" id="company-info">
	                	<div class="jcarousel">
							<ul>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
								<li><img src="assets/images/office.jpg"></li>
							</ul>
						</div>
						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
					<p>{{$job->ntd->company->full_description}}</p>
				</div>
				<a href="#" class="pull-right text-blue"><i class="fa fa-arrow-circle-right"></i> Việc làm khác từ công ty này</a>
				</div>
			</div>
			<div class="boxed related-jobs">
				<div class="rows">
				<div class="title-page">
					<h2>Việc làm từ công ty khác</h2>
				</div>
				<ul class="arrow-square-orange">
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
						<li><a href="#">IOS Developer Đà Nẵng</a></li>
					</ul>
				</div>
			</div>
			<div class="social pull-right">
							<span>Chia sẻ: </span>
							<a href="#" class="rss" target="_blank" title="Rss"></a>
							<a href="#" class="facebook" target="_blank" title="Facebook"></a>
	                        <a href="#" class="twitter" target="_blank" title="Twitter"></a>
	                        <a href="#" class="linkedin" target="_blank" title="Linkedin"></a>
	                        <a href="#" class="pinterest" target="_blank" title="Pinterest"></a>
	                        <a href="#" class="dribble" target="_blank" title="Dribble"></a>
						</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
				<div class="widget row">
					<h3>Việc làm phù hợp</h3>
					<ul>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
						<li>
							<div class="col-sm-3"><img src="assets/images/mp.png"></div>
							<div class="col-sm-9">
								<a href="#" class="text-blue"><strong>Trưởng phòng nhân sự</strong></a>
								<div>Minh Phúc Telecom, <span class="text-orange">3000$</span></div>
							</div>
						</li>
					</ul>
				</div>
				<div class="widget row ads">
					<a href="#"><img src="assets/images/ads01.jpg"></a>
				</div>
				<div class="widget row ads">
					<a href="#"><img src="assets/images/ads02.jpg"></a>
				</div>
		</aside>
	</section>
@stop
	@section('scripts')
	<script type="text/javascript">
	</script>
@stop