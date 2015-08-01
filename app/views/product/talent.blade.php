@extends('layouts.product')
@section('title') Talent Solution @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Talent <span class="text-orange">Solution</span></h1>
						<div>
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="hiring-description">
							Giải pháp kết nối<br>
Tuyển dụng ̃Quản lý nhân tài
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box01.png') }}
							<h2 class="hiring-box-title"><span>Tổng Quan</span></h2>
							<h4 class="tong-description">Giải pháp toàn diện kết nối, tuyển dụng & quản lý nhân tài</h4>
							<p class="tong-info">
								Talent Solution – giải pháp tuyển dụng toàn diện dành cho doanh nghiệp được sáng tạo độc quyền bởi VnJobs.vn...
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Talent Solution sẽ giúp bạn:</h4>
							<p class="tong-info">
								Chủ động tiếp cận với xu hướng tìm kiếm việc làm trực tuyến của ứng viên tại Việt Nam
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
			<div id="tongquan" class="talent">
				<div class="row">
					<div class="container talent">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-xs-9  col-xs-offset-2 text-center tq-middle">
									<p class="padding-top-10">Giải pháp toàn diện kết nối, tuyển dụng & quản lý nhân tài</p>
									<p>
										Talent Solution – giải pháp tuyển dụng toàn diện dành cho doanh nghiệp được sáng tạo độc quyền bởi CareerBuilder. Talent Solution tận dụng công nghệ kỹ thuật số nhằm thu hút các ứng viên từ tất cả các nguồn và thiết bị. Không đợi đến khi có nhu cầu tuyển dụng, bạn có thể xây dựng dữ liệu ứng viên chất lượng cao và thông báo đến đúng đối tượng khi có cơ hội việc làm mới nhất!
									</p>
									<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-default btn-contact">Liên hệ</a>
								</div>
							</div>
						</div> <!-- /.col-sm-12 -->
					</div> <!-- /.container -->
				</div> <!-- /.row -->
			</div>
			<div class="clearfix"></div>
			<div id="useful" class="talent1">
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
								<li><strong>Talent Driver mang đến:</strong>
									<div class="loi-ich-info">
										Chủ động tiếp cận với xu hướng tìm kiếm việc làm trực tuyến của ứng viên tại Việt Nam<br>
										Xây dựng thương hiệu tuyển dụng<br>
										Kết nối với ứng viên tiềm năng  – Xây dựng nguồn nhân tài cho nhu cầu hiện tại và tương lai<br>
										Tự động tương tác với ứng viên<br>
										ATS – Giúp việc tuyển dụng dễ dàng hơn<br>
										Mang lại hiệu quả đầu tư tốt hơn cho tất cả hoạt động tuyển dụng
									</div>
								</li>
								<li><strong>TÍNH NĂNG ĐỘC ĐÁO:</strong>
									<div class="loi-ich-info">
										<strong>Trang nghề nghiệp mang đậm dấu ấn doanh nghiệp & đăng tuyển dụng không giới hạn:</strong>
										Đăng tuyển dụng không giới hạn và quản lý nguồn dữ liệu ứng viên dễ dàng trên Talent Solution.<br>
										Talent Solution giúp ứng viên nhận biết đến thương hiệu tuyển dụng, tìm hiểu về chính sách cũng như sự phát triển của công ty. Đây là cách tốt nhất để thu hút nhiều nhân tài và ứng viên có kinh nghiệm về cho doanh nghiệp.<br>
										Hệ thống ATS thông minh sẽ giúp công ty bạn xây dựng cơ sở dữ liệu hồ sơ ứng viên với dung lượng lưu trữ không giới hạn.<br>
									</div>
								</li>
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