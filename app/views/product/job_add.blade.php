@extends('layouts.product')
@section('title') Đăng tuyển dụng @stop
@section('primary')
	<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Đăng <span class="text-orange">Tuyển Dụng</span></h1>
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
							<h4 class="tong-description">Xây dựng đội ngũ nhân tài cho doanh nghiệp</h4>
							<p class="tong-info">
								Bạn có thể đăng thông tin tuyển dụng không giới hạn số lượng từ ngữ để thu hút những ứng viên xuất sắc nhất. Thông tin đăng tuyển của bạn sẽ hiển thị trực tuyến trên VnJobs.vn và các trang đối tác của chúng tôi trong vòng 30 ngày.
							</p>
						</div>
						<div class="col-md-4">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Xây dựng đội ngũ nhân tài cho doanh nghiệp</h4>
							<p class="tong-info">
								Thông tin tuyển dụng của bạn sẽ được đăng tải rộng rãi trên các trang web lớn, không tăng thêm chi phí www.tuoitre.vn
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
													<th>Chọn</th>
													<th>Đơn giá</th>
													<th>Giá trọn gói</th>
													<th>Tiết kiệm</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1 Job</td>
													<td>1.490.000</td>
													<td>1.490.000</td>
													<td>--</td>
												</tr>
												<tr>
													<td>2</td>
													<td>1.275.000</td>
													<td>2.550.000</td>
													<td>14%</td>
												</tr>
												<tr>
													<td>3</td>
													<td>1.180.000</td>
													<td>3.540.000</td>
													<td>21%</td>
												</tr>
												<tr>
													<td>5</td>
													<td>1.120.000</td>
													<td>5.600.000</td>
													<td>25%</td>
												</tr>
												<tr>
													<td>10</td>
													<td>970.000</td>
													<td>9.700.000</td>
													<td>35%</td>
												</tr>
												<tr>
													<td>20</td>
													<td>840.000</td>
													<td>16.800.000</td>
													<td>44%</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-xs-5 tq-right">
									
									<div class="tq-content">
										<p>Tìm kiếm nhân tài chưa bao giờ dễ dàng hơn thế:</p>
										<ol>
											<li>Đăng nhập tài khoản nhà tuyển dụng.</li>
											<li>Nhập thông tin đăng tuyển.</li>
											<li>Chọn gói dịch vụ mong muốn.</li>
											<li>Bấm "Đăng tuyển" để hoàn thành.</li>
										</ol>
										Bạn đã đăng tuyển thành công cùng <a href="{{ URL::route('jobseekers.home') }}" class="red">VnJobs.vn</a>.
									</div>
									<a href="{{ URL::route('employers.job.add') }}" class="btn btn-default btn-contact">Đăng tuyển ngay</a>
									<div class="tq-content tq-content-bottom">
										<p>Quý khách muốn quảng bá thông tin tuyển dụng này?<br>
										Tìm hiểu thêm <a href="{{ URL::route('product.marketing') }}" class="red">Quảng Bá Thông Tin Tuyển Dụng.</a></p>
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
								<li>Thông tin tuyển dụng của bạn sẽ được đăng tải rộng rãi trên các trang web lớn, không tăng thêm chi phí www.tuoitre.vn</li>
								<li>Sử dụng linh hoạt và tiết kiệm lên đến 58% khi lựa chọn gói đăng tuyển với thời hạn 1 năm.</li>
								<li>Dễ dàng viết phần mô tả công việc chuyên nghiệp và thu hút nhờ thư viện mẫu đăng tuyển của chúng tôi.</li>
								<li>Tùy chỉnh nội dung trong suốt thời gian đăng tuyển.</li>
								<li>Phần mềm HRCentral thông minh hỗ trợ bạn quản lý và phân loại hồ sơ nhanh chóng và hiệu quả.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
@stop