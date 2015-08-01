@extends('layouts.product')
@section('title') Talent Driver @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Talent <span class="text-orange">Driver</span></h1>
						<div>
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="hiring-description">
							Giải pháp kết hợp giữa<br>
							Tuyển dụng & Marketing
						</div>
						<div class="clearfix"></div>
						<div class="col-md-6">
							{{ HTML::image('product-service/images/box01.png') }}
							<h2 class="hiring-box-title"><span>Tổng Quan</span></h2>
							<h4 class="tong-description">Giải pháp quảng bá thương hiệu tuyển dụng & Thu hút nhân tài</h4>
							<p class="tong-info">
								Talent Driver là giải pháp kết hợp giữa chuyên môn tuyển dụng và marketing được phát triển nhằm thu hút nhân tài và quảng bá thương hiệu tuyển dụng đến các ứng viên tiềm năng qua các kênh truyền thông trực tuyến.
							</p>
						</div>
						<div class="col-md-6">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Talent Driver mang đến:</h4>
							<p class="tong-info">
								Kết hợp giữa chuyên môn tuyển dụng & marketing
Tiết kiệm chi phí dựa trên hiệu quả của chiến dịch
Nhắm đúng vào đối tượng phù hợp
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
								<div class="col-sm-6 tq-left">
									
									<div class="tq-content">
										<div class="tq-notice">
											<span>Giải pháp quảng bá thương hiệu tuyển dụng & Thu hút nhân tài</span>
										</div>
										<p>
											Talent Driver là giải pháp kết hợp giữa chuyên môn tuyển dụng và marketing được phát triển nhằm thu hút nhân tài và quảng bá thương hiệu tuyển dụng đến các ứng viên tiềm năng qua các kênh truyền thông trực tuyến.
										</p>
										
									</div>
								</div>
								<div class="col-sm-6 tq-right">
									<div class="tq-content">
										<div class="tq-notice">
											<span>KHI NÀO SỬ DỤNG TALENT DRIVER</span>
										</div>
										<ul>
											<li>Nhu cầu tuyển dụng gấp</li>
											<li>Nhu cầu tuyển dụng nhiều người cho cùng một vị trí hoặc nhiều vị trí cho một phòng ban</li>
											<li>Quảng bá sự kiện tuyển dụng hoặc xây dựng thương hiệu tuyển dụng</ul>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-xs-12 text-center tq-center">
									<div>
									<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-default btn-contact">Liên hệ</a>
									</div>
									<p class="padding-top-10">Tối ưu hóa hiệu quả tiếp cận và tuyển dụng nhân tài cùng Talent Driver!<br>
									<a href="{{ URL::route('product.talent') }}" class="red">Download Talent Driver Sales Kit</a></p>
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
									<ul>
										<li>Kết hợp giữa chuyên môn tuyển dụng & marketing</li>
										<li>Tiết kiệm chi phí dựa trên hiệu quả của chiến dịch</li>
										<li>Nhắm đúng vào đối tượng phù hợp</li>
										<li>Xây dựng thương hiệu nhà tuyển dụng</li>
									</ul>
								</li>
								<li><strong>GIẢI PHÁP DÀNH RIÊNG CHO BẠN</strong>
								<ul>
									<li>Thông điệp chủ đạo và thiết kế sáng tạo</li>
									<li>Quảng bá thông tin tuyển dụng của doanh nghiệp qua các kênh truyền thông trực tuyến:
										<ul>
											<li>Trang chủ VnJobs Việt Nam</li>
											<li>Thông tin quảng cáo trên mạng xã hội Facebook</li>
											<li>Trang Facebook trực thuộc  VnJobs  Việt Nam với hàng trăm nghìn fan</li>
											<li>Thông báo điện tử (Newsletter) được gửi ra từ  VnJobs  Việt Nam</li>
											<li>Các trang mạng phổ biến tại Việt Nam</li>
										</ul>
									</li>
									<li>Thể hiện thông tin hiệu quả của chiến dịch qua báo cáo cụ thể đến doanh nghiệp</li>
								</ul>
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