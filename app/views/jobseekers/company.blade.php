@extends('layouts.jobseeker')
@if($company != null)
	@section('title') {{$company->company_name}} @stop
@else
	@section('title') Không tìm thấy thông tin công ty @stop
@endif
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
			@if($company != null)
			<div class="boxed">
				<div class="details company">
					<div class="top">
						@if($company->logo != '')
						<div class="col-sm-2">
						{{HTML::image('/uploads/companies/logos/'.$company->logo.'')}}
						</div>
						@endif
						<div class="col-sm-10"><h1>{{$company->company_name}}</h1><i>{{$company->company_address}}</i></div>
					</div>
						<div class="clearfix"></div>
						<h3>THÔNG TIN CƠ BẢN</h3>
						<table class="table table-striped table-hover table-bordered">
						<tbody>
							<tr>
								<td><strong>Số đăng ký</strong></td>
								<td>
								@if($company->sodangky != '')
									{{$company->sodangky}}
								@else
									đang cập nhật
								@endif
								</td>
								<td><strong>Quy mô công ty</strong></td>
								<td>
								@if($company->quymocty != '')
									{{Config::get('custom_quymo.quymo')[$company->quymocty]}}
								@else
									đang cập nhật
								@endif
								</td>
							</tr>
							<tr>
								<td><strong>Website</strong></td>
								<td>
								@if($company->website != '')
									{{$company->website}}
								@else
									đang cập nhật
								@endif
								</td>
								<td><strong>Giờ làm việc</strong></td>
								<td>
								@if($company->giolamviec != '')
									{{$company->giolamviec}}
								@else
									đang cập nhật
								@endif
								</td>
							</tr>
						</tbody>
						</table>
						<h3>TỔNG QUAN CÔNG TY</h3>
						<p>{{$company->full_description}}</p>
						<h3>VÌ SAO CHỌN CHÚNG TÔI</h3>
						<p>{{$company->chonchungtoi}}</p>
						<h3>HÌNH ẢNH CÔNG TY</h3>
						@if(count(json_decode($company->company_images)))
						<div class="jcarousel-wrapper" id="company-info">
		                	<div class="jcarousel">
								<ul>
								@foreach(json_decode($company->company_images) as $img)
									<li>{{HTML::image('/uploads/companies/images/'.$img.'')}}</li>
								@endforeach
								</ul>
							</div>
							<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
		                	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
						</div>
						@endif
				</div>
			</div>
			@else
			<div class="boxed">
				Công ty đang cập nhật thông tin
			</div>
			@endif
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
				@include('includes.jobseekers.widget.right-suggested-jobs')
				
		</aside>

	</section>
@stop
