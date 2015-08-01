@extends('layouts.product')
@section('title') Quảng bá thông tin tuyển dụng @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Quảng bá thông tin <span class="text-orange">Tuyển Dụng</span></h1>
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
							<h4 class="tong-description">Tạo sự khác biệt cho thương hiệu công ty</h4>
							<p class="tong-info">
								Thông tin tuyển dụng của bạn sẽ nổi bật hơn nhờ nội dung đăng tuyển được thiết kế hấp dẫn nhấn mạnh văn hóa và thương hiệu công ty...
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Nhiều lợi ích cho Doanh nghiệp của bạn</h4>
							<p class="tong-info">
								Thông tin tuyển dụng hấp dẫn hơn trong mắt ứng viên với logo nổi bật của công ty.
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
			<div id="tongquan" class="qb">
				<div class="row">
					<div class="container quangba">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-sm-6 tq-left">
									
									<div class="tq-content">
										<strong>
											Tạo sự khác biệt cho thương hiệu công ty
										</strong>
										<p>
											Thông tin tuyển dụng của bạn sẽ nổi bật hơn nhờ nội dung đăng tuyển được thiết kế hấp dẫn nhấn mạnh văn hóa và thương hiệu công ty.
										</p>
										<p>
											Vnjobs.vn cung cấp các gói dịch vụ đa dạng và linh hoạt để bạn lựa chọn: Extra Package, Effect Package, Power Package and VIP Package với các tính năng hấp dẫn:<br>
											Đăng tuyển dụng trong 30 ngày.<br>
											Tiêu đề Đậm & Đỏ trong 30 ngày.<br>
											Hiển thị nổi bật tại "Vị trí hàng đầu theo ngành" trong 7 ngày.<br>
											Mẫu đăng tuyển nổi bật hiển thị logo trong 30 ngày và mẫu đăng tuyển tùy chọn.<br>
											Hiển thị trong mục "Việc làm nổi bật" trên trang chủ trong 7 ngày.
										</p>
										<a href="{{ URL::route('employers.orders.add') }}" class="btn btn-default btn-contact">Liên Hệ</a>
									</div>
								</div>
								<div class="col-xs-6 tq-right">
									
									<div class="tq-content">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Gói dịch vụ</th>
													<th>Mô tả</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Regular</td>
													<td class="align-left">Đăng tuyển dụng trong 30 ngày.</td>
												</tr>
												<tr>
													<td>Extra</td>
													<td class="align-left">Đăng tuyển dụng trong 30 ngày.<br>
													Tiêu đề Đậm & Đỏ trong 30 ngày.</td>
												</tr>
												<tr>
													<td>Effect</td>
													<td class="align-left">Đăng tuyển dụng trong 30 ngày.<br>
													Hiển thị nổi bật tại "Vị trí hàng đầu theo ngành" trong 7 ngày.</td>
												</tr>
												<tr>
													<td>Power</td>
													<td class="align-left">Đăng tuyển dụng trong 30 ngày.<br>
Hiển thị nổi bật tại "Vị trí hàng đầu theo ngành" trong 7 ngày.<br>
Mẫu đăng tuyển nổi bật hiển thị logo trong 30 ngày và mẫu đăng tuyển tùy chọn.</td>
												</tr>
												<tr>
													<td>Vip</td>
													<td class="align-left">Đăng tuyển dụng trong 30 ngày.<br>
Tiêu đề Đậm & Đỏ trong 30 ngày.<br>
Hiển thị nổi bật tại "Vị trí hàng đầu theo ngành" trong 7 ngày.<br>
Mẫu đăng tuyển nổi bật hiển thị logo trong 30 ngày và mẫu đăng tuyển tùy chọn.<br>
Hiển thị trong mục "Việc làm nổi bật" trên trang chủ trong 7 ngày.</td>
												</tr>
												
											</tbody>
										</table>
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
								<li>Thông tin tuyển dụng hấp dẫn hơn trong mắt ứng viên với logo nổi bật của công ty.</li>
								<li>Dễ dàng quản lý và cập nhật thông tin tuyển dụng.</li>
								<li>Kết hợp tuyển dụng và quảng bá thương hiệu đến hàng triệu ứng viên.</li>
								<li>Nổi bật hơn so với các thông tin tuyển dụng khác.</li>
								<li>Thu hút các ứng viên sáng giá ứng tuyển.</li>
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