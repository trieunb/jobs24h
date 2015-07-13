@extends('layouts.employer')
@section('title') Cập nhật thông tin công ty @stop
@section('content')
	<section class="main-content">
		<div class="container">
			<div class="banner">
				{{ HTML::image('assets/ntd/images/banner-for-ntd.jpg') }}
			</div>
			<div class="row push-padding-20 company-info">
				<div class="col-sm-2">
					@if(file_exists(Config::get('app.upload_path') . 'companies/logos/'.$company->logo) && $company->logo != NULL)
					{{ HTML::image('uploads/companies/logos/'.$company->logo) }}
					@endif
				</div>
				<div class="col-sm-10">
					<h1 class="gotham">{{ $company->loaihinhhoatdong }}</h1>
					<h2>{{ $company->company_name }}</h2>
				</div>
			</div>
			<div class="update-info">
				<div class="col-sm-6 row">
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Tổng quan công ty</h2>
						</div>
						<div class="push-padding-20">
							<article>
								<!-- <ul class="arrow-square-orange">
									
								</ul> -->
								{{ $company->full_description }}
							</article>
						</div>
					</div>	
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Vì sao chọn chúng tôi</h2>
						</div>
						<div class="push-padding-20">
							<ul class="arrow-square-orange">
								<li>
								{{ nl2br($company->chonchungtoi) }}
								</li>
							</ul>
						</div>
					</div>
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Vị trí đang tuyển dụng</h2>
						</div>
						<div class="push-padding-10">
							<table class="table table-blue">
								<thead>
									<tr>
										<th>Ngày</th>
										<th>Vị trí</th>
										<th>Địa điểm làm việc</th>
									</tr>
								</thead>
								<tbody>
									@if(count($jobs))
										@foreach($jobs as $job)
											<tr>
												<td>{{ $job->created_at }}</td>
												<td>{{ $job->vitri }}</td>
												<td>{{ $job->province->first()->province->province_name }}</td>
											</tr>
										@endforeach
									@endif
									
								</tbody>
							</table>
							<ul class="sosial-share col-sm-7">
								<li>Facebook</li>
								<li>Twitter</li>
								<li>Google +</li>
							</ul>
							<!-- <ul class="pagination pull-right pagination-sm pagination-blue">
								
							</ul> -->
							<div id="pagination">
								{{ $jobs->links() }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 row">
					<div class="row blocked snapshot">
						<div class="header-blocked">
							<h2>THÔNG TIN CƠ BẢN</h2>
						</div>
						<div class="push-padding-20">
							<ul class="arrow-square-orange">
								<li class="col-sm-6">
									<strong>Số đăng ký</strong>
									<span>{{ $company->sodangky }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Ngành nghề</strong>
									<span>{{ isset($company->category->cat_name)?$company->category->cat_name:'' }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Quy mô công ty</strong>
									<span>{{ Config::get('custom_quymo.quymo')[$company->quymocty] }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Giờ làm việc</strong>
									<span>{{ $company->giolamviec }}</span>
								</li>
								<li class="col-sm-6">
									<strong>Ngôn ngữ</strong>
									<span>{{ $company->ngonngu }}</span>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="row blocked gallery-photo">
						<div class="header-blocked">
							<h2>Hình ảnh công ty</h2>
						</div>
						<div class="push-padding-20">
							<ul>
							@if(json_decode($company->company_images))
								@foreach(json_decode($company->company_images) as $image)
									@if($image)
									<li class="col-sm-4"><a>{{ HTML::image('uploads/companies/images/'.$image) }}</a></li>
									@endif
								@endforeach
							@endif
							</ul>
						</div>
					</div>
					
					<div class="row blocked">
						<div class="header-blocked">
							<h2>Địa chỉ</h2>
						</div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.716813365803!2d108.22286759999999!3d16.08017850000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142183b9e1d0f0b%3A0xef084c023587ccde!2zNiBUcuG6p24gUGjDuiwgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1432712461755" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
						<span class="push-padding-10"><i class="fa fa-map-marker fa-1x"></i>  {{ $company->company_address }}</span>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('style')
	{{ HTML::style('assets/css/datepicker.min.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	
@stop