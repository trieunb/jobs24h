@extends('layouts.jobseeker')
@section('content')
	@include('includes.jobseekers.search')
	<div class="home">
			<div class="bg-silver-dark">
			<section class="top-companies clearfix">
				<div class="jcarousel-wrapper">
                	<div class="jcarousel">
						<ul>
							<li><a href="http://vn.toto.com/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_1.png') }}</div></a></li>
							<li><a href="http://www.baoviet.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_2.png') }}</div></a></li>
							<li><a href="http://sharp.vn/vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_3.png') }}</div></a></li>
							<li><a href="https://www.pjico.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_4.png') }}</div></a></li>
							<li><a href="http://www.prudential.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_5.png') }}</div></a></li>
							<li><a href="http://vna-insurance.com/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_6.png') }}</div></a></li>
							<li><a href="http://www.jetstar.com/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_7.png') }}</div></a></li>
							<li><a href="http://www.mailinh.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_8.png') }}</div></a></li>
							<li><a href="https://topica.edu.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_9.png') }}</div></a></li>
							<li><a href="http://doji.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_10.png') }}</div></a></li>
							<li><a href="http://viettel.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_11.png') }}</div></a></li>
							<li><a href="http://www.mobifone.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_12.png') }}</div></a></li>
							<li><a href="http://www.vinaphone.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_13.png') }}</div></a></li>
							<li><a href="http://www.cmc.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_14.png') }}</div></a></li>
							<li><a href="http://truyenhinhanvien.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_16.png') }}</div></a></li>
							<li><a href="http://www.vtvcab.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_17.png') }}</div></a></li>
							<li><a href="http://www.bidv.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_18.png') }}</div></a></li>
							<li><a href="http://www.vpbank.com.vn/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_19.png') }}</div></a></li>
							<li><a href="http://www.allianz-global-assistance.com/corporate/" target="_blank"><div class="company">{{ HTML::image('assets/images/hoptac/logo_20.png') }}</div></a></li>
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
						<a href="#" class="text-blue active" id="featured_jobs">Việc làm nổi bật</a>
						<span>|</span>
						<a href="#" class="text-blue" id="new_jobs">Việc làm mới nhất</a>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="top-job container">
						<ul class="arrow-square-orange featured_jobs">
						@foreach($featured_jobs as $key => $job)
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
							<li class="hidden">
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
						<ul class="arrow-square-orange new_jobs hidden">
						@foreach($new_jobs as $key => $job)
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
							<li class="hidden">
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
						<a class="load-more-ajax">{{ HTML::image('assets/images/load_more.png') }}</a>
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
							<a class="btn bg-orange upc sort-name">Nhóm ngành</a>
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
					<div class="jcarousel-wrapper" id="top-employer">
	                	<div class="jcarousel">
							<ul>
								@foreach($emp_hot as $val)
									@if(@$val->company->logo != null && count($val->job) > 0)
										<li class="col-sm-2"><img src="{{URL::to("uploads/companies/logos/".$val->company->logo."")}}"></li>
									@endif
								@endforeach
								<li>{{ HTML::image('assets/images/hoptac/logo_12.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_13.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_14.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_17.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_18.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_19.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_12.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_13.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_14.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_16.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_17.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_18.png') }}</li>
								<li>{{ HTML::image('assets/images/hoptac/logo_19.png') }}</li>
							</ul>
						</div>
						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
				</section>
				@endif
				@if(isset($news))
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
										@if($new['post']->post_name != null)
										<a href="{{$new['post']->guid}}" target="_blank"><img src="{{$new['thumbnail']}}"></a>
										@else
										
										<a href="{{$new['post']->guid}}"><img src="{{URL::to("assets/images/photo_default.png")}}"></a>
										@endif
									</div>
									<div class="meta">
										<span class="date">{{date('d M, Y', strtotime($new['post']->post_date))}}</span>
									</div>
									<article>
										<h3><a href="{{$new['post']->guid}}" target="_blank">{{$new['post']->post_title}}</a></h3>
										<?php
										// strip tags to avoid breaking any html
										$string = $new['post']->post_content;
										$string = strip_tags($string);

										if (strlen($string) > 200) {

										    // truncate string
										    $stringCut = substr($string, 0, 200);

										    // make sure it ends in a word so assassinate doesn't become ass...
										    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
										}
										echo "<p>$string</p>";
										?>
									
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
						<h2><a href="http://vnjobs.vn/cam-nang-viec-lam/cam-nang-nguoi-tim-viec/" class="text-orange">Cẩm nang Người tìm việc</a></h2>
						@if(isset($camnang_ntv))
							<ul class="arrow-square-blue">
							@foreach($camnang_ntv as $val)
								<li><a href="{{$val['post']->guid}}" target="_blank">{{$val['post']->post_title}}</a></li>
							@endforeach
						</ul>
						@endif
					</div>
					<div class="col-sm-4">
						<h2><a href="http://vnjobs.vn/cam-nang-viec-lam/cam-nang-nha-tuyen-dung/" class="text-orange">Cẩm nang Nhà Tuyển Dụng</a></h2>
						@if(isset($camnang_ntd))
						<ul class="arrow-square-blue">
							@foreach($camnang_ntd as $val)
								<li><a href="{{$val['post']->guid}}" target="_blank">{{$val['post']->post_title}}</a></li>
							@endforeach
						</ul>
						@endif
					</div>
					<div class="col-sm-4 last">
						<h2 class="text-orange">Nhận xét khách hàng</h2>
						<blockquote>Công ty TNHH Minh Phúc làm việc rất chuyên nghiệp. Nhờ trang web <a href="#" class="text-blue">Vnjobs.vn</a> mà tôi có một công việc phù hợp và có một thu nhập ổn định khi mới ra trường. Tôi xin gửi lời cảm ơn đến công ty.</blockquote>
					</div>
				</section>
				</div>
		</div>
@section('scripts')
@parent
<script type="text/javascript">
	$(function() {
		$('body').addClass('home');
	});
</script>
@stop
@stop