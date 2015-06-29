@extends('layouts.jobseeker')
@section('content')
	@include('includes.jobseekers.search')
	<div class="home">
			<div class="bg-silver-dark">
			<section class="top-companies clearfix">
				<div class="jcarousel-wrapper">
                	<div class="jcarousel">
						<ul>
							@foreach(range(1, 8) as $index)
								<li><div class="company">{{ HTML::image('assets/images/brand04.png') }}<span>Delighting You Always</span></div></li>
							@endforeach
							
						</ul>
					</div>
					<span class="ctr left"><a href="#" class="jcarousel-control-prev">&lsaquo;</a></span>
                	<span class="ctr right"><a href="#" class="jcarousel-control-next">&rsaquo;</a></span>
				</div>
			</section>
			</div>
				<section class="featured-items">
					<div class="padding bg-silver-dark">
					<div class="header-page">
						<a href="#" class="text-blue active">Việc làm nổi bật</a>
						<span>|</span>
						<a href="#" class="text-blue">Việc làm mới nhất</a>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="top-job container">
						<ul class="arrow-square-orange">
						@foreach($jobs as $key => $job)
							@if($key < 30)
							<li>
								<div class="desc-job">
									<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">
										<strong>{{$job->vitri}}</strong>
										<span>{{$job->ntd->company->company_name}}</span>
									</a>
								</div>
							</li>
							@else
							<li class="hidden-xs">
								<div class="desc-job">
									<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">
										<strong>{{$job->vitri}}</strong>
										<span>{{$job->ntd->company->company_name}}</span>
									</a>
								</div>
							</li>
							@endif
						@endforeach
						</ul>
						<div class="clearfix"></div>
						<a class="load-more-ajax"></a>
					</div>
				</section>
				<div class="padding bg-silver-dark">
				<section class="search-by-categories container clearfix">
					<div class="header-page">
						<h2>Tìm việc làm theo Ngành Nghề</h2>
					</div>
					<div class="panel">
						<div class="col-sm-7 panel-left">
							<span><strong>Bạn đang xem danh sách ngành nghề sắp xếp theo:</strong></span>
							<a class="btn bg-orange upc sort-name">Ngành Hot</a>
						</div>
						<div class="col-sm-5 panel-right pull-right">
							<div class="sort-by-categories bg-blue">
								<span>Sắp xếp theo: </span>
								<ul>
									<li class="cate_alpha"><a href="#">ABC</a></li>
									<li class="cate_default"><a href="#" class="active">Nhóm ngành</a></li>
									<li class="cate_hot"><a href="#">Ngành HOT</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="categories-list">
							<ul class="arrow-square-orange cate_default">
								@foreach ($categories_default as $key => $cate)
								<li>
									<strong><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></strong> ({{$cate->mtcategory->count()}})
								</li>
								@endforeach
							</ul>
							<ul class="arrow-square-orange cate_alpha hidden-xs">
								@foreach ($categories_alpha as $key => $cate)
								<li>
									<strong><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></strong> ({{$cate->mtcategory->count()}})
								</li>
								@endforeach
							</ul>
							<ul class="arrow-square-orange cate_hot hidden-xs">
								@foreach ($categories_hot as $key => $cate)
								<li>
									<strong><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></strong> ({{$cate->mtcategory->count()}})
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</section>
				</div>
				<section class="vnjobs">
					<div class="container">
						<div class="col-sm-4">
							{{ HTML::image('assets/images/icons/phone.png') }}
							<h3>Ứng dụng Mobile vnjobs</h3>
							<p>Nhanh tay tải ứng dụng VNJobs trên nền di động nhé.</p>
						</div>
						<div class="col-sm-4">
							{{ HTML::image('assets/images/icons/about.png') }}
							<h3>Vì sao chọn vnjobs</h3>
							<p>Lý do chúng tôi là nhà cung cấp việc làm hàng đầu.</p>
						</div>
						<div class="col-sm-4">
							{{ HTML::image('assets/images/icons/users.png') }}
							<h3>Hồ sơ trực tuyến</h3>
							<p>Tìm việc làm và nộp hồ sơ trực tuyến mọi lúc mọi nơi.</p>
						</div>
					</div>
				</section>
				@if(count($emp_hot))
				<section class="top-employer clearfix padding bg-silver-dark">
					<div class="header-page">
						<h2>Nhà tuyển dụng hàng đầu</h2>
					</div>
					<ul>
						@foreach($emp_hot as $val)
							@if(@$val->company->logo != null)
								<li class="col-sm-2"><img src="{{URL::to("uploads/companies/logos/".$val->company->logo."")}}"></li>
							@else
								<li class="col-sm-2">{{ HTML::image('assets/images/default_logo.png') }}</li>
							@endif
						@endforeach
					</ul>
				</section>
				@endif
				@if(count($news))
				<section class="news clearfix">
					<div class="header-page">
						<h2>Tin tức mới nhất</h2>
					</div>
					<div class="jcarousel-wrapper" id="news">
	                	<div class="jcarousel">
							<ul>
								@foreach($news as $new)
								<li>
									<div class="thumbs">
										@if($new->thumbnail != null)
										<img src="{{URL::to("uploads/news/".$new->thumbnail."")}}">
										@else
										<img src="/images/photo_default.png">
										@endif
									</div>
									<div class="meta">
										<span class="date">{{date('d M, Y', strtotime($new->updated_at))}}</span>
									</div>
									<article>
										<h3><a href="{{URL::route('news.view', array($new->id))}}">{{$new->title}}</a></h3>
										<?php
										// strip tags to avoid breaking any html
										$string = $new->content;
										$string = strip_tags($string);

										if (strlen($string) > 200) {

										    // truncate string
										    $stringCut = substr($string, 0, 200);

										    // make sure it ends in a word so assassinate doesn't become ass...
										    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
										}
										echo "<p>$string</p>";
										?>
										<a href="{{URL::route('news.view', array($new->id))}}" class="read-more">Chi tiết</a>
									</article>
								</li>
								@endforeach
							</ul>
						</div>
						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
						</div>
				</section>
				@endif
				<div class="padding bg-silver-dark push-bottom-30">
				<section class="bottom container">
					<div class="col-sm-4">
						<h2 class="text-orange">Cẩm nang Người tìm việc</h2>
						<ul class="arrow-square-blue">
						@foreach($camnang_ntv as $val)
							<li><a href="{{URL::route('news.view', array($val->id) )}}">{{$val->title}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-4">
						<h2 class="text-orange">Cẩm nang Nhà Tuyển Dụng</h2>
						<ul class="arrow-square-blue">
							@foreach($camnang_ntd as $val)
								<li><a href="{{URL::route('news.view', array($val->id) )}}">{{$val->title}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-4 last">
						<h2 class="text-orange">Nhận xét khách hàng</h2>
						<blockquote>Công ty TNHH Minh Phúc làm việc rất chuyên nghiệp. Nhờ trang web <a href="#" class="text-blue">Vnjobs.vn</a> mà tôi có một công việc phù hợp và có một thu nhập ổn định khi mới ra trường. Tôi xin gửi lời cảm ơn đến công ty.</blockquote>
					</div>
				</section>
				</div>
		</div>
@stop
@section('scripts')
@parent
<script type="text/javascript">
	$(function() {
		$('body').addClass('home');
	});
</script>
@stop