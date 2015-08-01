@extends('layouts.product')
@section('title') Tìm hồ sơ @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Tìm Hồ Sơ <span class="text-orange">Ứng Viên</span></h1>
						<div>
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="hiring-description">
							Hãy đăng tin tuyển dụng của bạn để có những ứng viện tuyệt với nhất!
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box01.png') }}
							<h2 class="hiring-box-title"><span>Tổng Quan</span></h2>
							<h4 class="tong-description">Không bỏ lỡ nhân tài</h4>
							<p class="tong-info">
								Truy cập vào hàng trăm ngàn hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên để tìm kiếm những ứng viên phù hợp nhất với vị trí tuyển dụng.
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<p class="tong-info">
								Chủ động liên hệ với ứng viên tiềm năng.<br>
Truy cập vào hàng trăm ngàn hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên.
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
			<div id="tongquan">
				<div class="row">
					<div class="container dangtuyendung-single">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-sm-7 tq-left">
									
									<div class="tq-content">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Dịch vụ</th>
													<th>Thời gian sử dụng</th>
													<th>Số hồ sơ</th>
													<th>Đơn giá</th>
													<th>Tiết kiệm</th>
													<th>Giá trọn gói</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>RD 2w</td>
													<td>14 ngày</td>
													<td>240</td>
													<td>2.988.000</td>
													<td>&nbsp;</td>
													<td>2.988.000</td>
												</tr>
												<tr>
													<td>RD 1</td>
													<td>30 ngày</td>
													<td>600</td>
													<td>4.260.000</td>
													<td>10%</td>
													<td>3.840.000</td>
												</tr>
												<tr>
													<td>RD 3</td>
													<td>3 tháng</td>
													<td>1.800</td>
													<td>12.780.000</td>
													<td>15%</td>
													<td>10.860.000</td>
												</tr>
												<tr>
													<td>RD 6</td>
													<td>6 tháng</td>
													<td>3.600</td>
													<td>25.550.000</td>
													<td>20%</td>
													<td>20.440.000</td>
												</tr>
												<tr>
													<td>RD 12</td>
													<td>12 tháng</td>
													<td>7.200</td>
													<td>51.090.000</td>
													<td>27%</td>
													<td>37.300.000</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-xs-5 tq-right">
									
									<div class="tq-content">
										<p><strong>Không bỏ lỡ nhân tài</strong></p>
										<p>
											Truy cập vào hàng trăm ngàn hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên để tìm kiếm những ứng viên phù hợp nhất với vị trí tuyển dụng.
										</p>
									</div>
									<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-default btn-contact">Liên hệ</a>
									
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
								<li>Chủ động liên hệ với ứng viên tiềm năng.</li>
								<li>Truy cập vào hàng trăm ngàn hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên.</li>
								<li>Tìm và lưu trữ hồ sơ ứng viên cho nhu cầu tuyển dụng trong tương lai.</li>
								<li>Tìm được ứng viên phù hợp nhất chỉ bằng một cú nhấp chuột.</li>
								<li>Dễ dàng quản lý và phân loại hồ sơ ứng viên.</li>
								<li>Nhanh chóng tiếp cận ứng viên qua chức năng gửi email.</li>
								<li>Không bao giờ bỏ lỡ ứng viên tiềm năng với chức năng thông báo ứng viên mới phù hợp qua email.</li>
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