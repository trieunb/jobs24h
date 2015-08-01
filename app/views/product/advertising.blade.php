@extends('layouts.product')
@section('title') Quảng cáo tuyển dụng @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Quảng cáo <span class="text-orange">Tuyển Dụng</span></h1>
						<div>
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="hiring-description">
							Giải pháp kết nối<br>
							Tuyển dụng Quản lý nhân tài
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box01.png') }}
							<h2 class="hiring-box-title"><span>Tổng Quan</span></h2>
							<h4 class="tong-description">Xây dựng thương hiệu tuyển dụng ấn tượng</h4>
							<p class="tong-info">
								Quảng cáo tuyển dụng có thể thu hút sự chú ý của các ứng viên tài năng nhờ gắn liên kết trực tiếp đến thông tin tuyển dụng của bạn trên Logo hoặc Banner...
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Nhiều lợi ích cho Doanh nghiệp của bạn</h4>
							<p class="tong-info">
								Thu hút các ứng viên tài năng ngay lập tức nhờ hiển thị logo và banner trên trang chủ.
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box03.png') }}
							<h2 class="hiring-box-title"><span>Mẫu đăng tuyển dụng</span></h2>
							<h4 class="tong-description">Xây dựng đội ngũ nhân tài cho doanh nghiệp</h4>
							<p class="tong-info">
								Bạn có thể đăng thông tin tuyển dụng không giới hạn số lượng từ ngữ để thu hút những ứng viên xuất sắc nhất. Thông tin đăng tuyển của bạn sẽ hiển thị trực tuyến trên VnJobs.vn và các trang đối tác của chúng tôi trong vòng 30 ngày.
							</p>
						</div>
					</div> <!-- /.container -->
				</div> <!-- /.row -->
			</div>
			<div class="clearfix"></div>
			<div id="tongquan" class="qc">
				<div class="row">
					<div class="container quangcao">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-sm-12 tq-left">
									
									<div class="tq-content">
										<strong>
											Xây dựng thương hiệu tuyển dụng ấn tượng trong mắt ứng viên
										</strong>
										<p>
											Quảng cáo tuyển dụng có thể thu hút sự chú ý của các ứng viên tài năng nhờ gắn liên kết<br> trực tiếp đến thông tin tuyển dụng của bạn trên Logo hoặc Banner.
										</p>
										<div class="col-xs-6">
											<div class="tq-notice">
												<span>External Link Advertising</span>
												
											</div>
											{{ HTML::image('product-service/images/price-left.png') }}
											<a href="{{ URL::route('employers.job.add') }}" class="btn btn-default btn-contact">Liên Hệ</a>
										</div>
										<div class="col-xs-6">
											<div class="tq-notice">
												<span>Internal Link Advertising</span>
												
											</div>
											{{ HTML::image('product-service/images/price-right.png') }}
										</div>
										
										
									</div>
								</div>
								
							</div>
						</div> <!-- /.col-sm-12 -->
					</div> <!-- /.container -->
				</div> <!-- /.row -->
			</div>
			<div class="clearfix"></div>
			<div id="useful">
				<div class="row">
					<div class="uf-container">
						<h1 class="text-center uf-title">Lợi ích</h1>
						<div class="text-center">
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="uf-left">	
							{{ HTML::image('product-service/images/uf-image-left.png', 'image-full', ['class'=>'image-full']) }}
						</div>
						<div class="uf-right">
							<ul class="loi-ich">
								<li>Thu hút các ứng viên tài năng ngay lập tức nhờ hiển thị logo và banner trên trang chủ.</li>
								<li>Nổi bật hơn các thông tin tuyển dụng khác nhờ mẫu thiết kế chuyên nghiệp.</li>
								<li>Quảng bá văn hóa và cơ hội việc làm của công ty bạn đến đông đảo ứng viên.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

@stop

@section('style')
{{ HTML::style('product-service/css/animate.css') }}
@stop
@section('script')
	{{ HTML::script('product-service/js/wow.min.js') }}
	<script>
 new WOW().init();
</script>
@stop