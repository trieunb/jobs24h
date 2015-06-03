@extends('layouts.employer')
@section('title') Bảng giá dịch vụ @stop
@section('content')
<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.order_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="box">
				<div class="heading-image">
					<h2 class="text-blue">{{ HTML::image('assets/ntd/images/cart-lg.png') }}Bảng giá dịch vụ</h2>
				</div>
				<div class="service-price">
					<div class="col-sm-6">
						<div class="heading-border-blue">
							<h4>BÁO GIÁ DỊCH VỤ (Áp dụng từ tháng 5 năm 2015)</h4>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">1</strong></span>
								<span class="col-sm-8"><strong>Đăng tuyển dịch vụ</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									@foreach(Config::get('custom_service.services')[3]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [3, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
									
									<li>
										<span class="col-sm-12">Vị trí tuyển dụng được đăng trong 30 ngày trên website: <a href="/">www.vnjobs.vn</a>
										</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">2</strong></span>
								<span class="col-sm-8"><strong>Dịch vụ cộng thêm</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									@foreach(Config::get('custom_service.services')[2]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [2, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">3</strong></span>
								<span class="col-sm-8"><strong>Kiếm hồ sơ ứng viên</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									@foreach(Config::get('custom_service.services')[1]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [1, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
									
									<li>
										Với ngân hàng dứ liệu trên 600.000 hồ sơ ứng viên<br>
										Chức năng tìm kiếm tự động<br>
										Chức năng lưu trữ thông minh
									</li>
								</ul>
							</div>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">4</strong></span>
								<span class="col-sm-8"><strong>Website tuyển dụng riêng</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									@foreach(Config::get('custom_service.services')[4]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [4, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
									
									<li>
										Thời gian tạo website tuyển dụng riêng cho bạn nhanh chóng!<br>
										Đăng tuyển dung không giới hạn, miễn phí.Giữ vị trí hiển thị nổi bật 24x7<br>
										Tiết kiệm chi phí vận hành
									</li>
								</ul>
							</div>
						</div>
					</div>		
					<div class="col-sm-6">
						<div class="heading-border-blue">
							<h4>BÁO GIÁ QUẢNG CÁO (Áp dụng từ tháng 5 năm 2015)</h4>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">1</strong></span>
								<span class="col-sm-8"><strong>Quảng cáo logo</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									@foreach(Config::get('custom_service.services')[5]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [5, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
									
									<li>
										Quảng cáo của bạn sẽ được hàng ngàn người xem mỗi ngày trên các trang: <a href="/">www.vnjobs.vn</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="item">
							<div class="heading-item row">
								<span class="col-sm-1 first"><strong class="text-blue">2</strong></span>
								<span class="col-sm-8"><strong>Banner quảng cáo</strong></span>
								<span class="col-sm-3"><strong>Giá</strong></span>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<ul class="menu-images-icons">
									<p><strong class="decoration">Trên <a href="/">www.vnjobs.vn</a></strong></p>
									@foreach(Config::get('custom_service.services')[6]['package'] as $k=>$s)
									<li>
										<span class="col-sm-9"><i class="fa fa-play text-orange"></i>&nbsp; {{ $s }}</span>
										<span class="col-sm-3"><a href="{{ URL::route('employers.orders.contact', [6, $k]) }}" class="text-blue">Liên hệ</a></span>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>		
				</div>
				</div>
			</section>
		</div>
	</section>
@stop
