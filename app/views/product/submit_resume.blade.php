@extends('layouts.product')
@section('title') Đăng tuyển dụng và tìm kiếm hồ sơ quốc tế @stop
@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Đăng Tuyển Dụng <span class="text-orange">& Tìm Kiếm Hồ Sơ Quốc tế</span></h1>
						<div>
							{{ HTML::image('product-service/images/sep.png') }}
						</div>
						<div class="hiring-description">
							Giải pháp kết nối<br>
							Tuyển dụng Quản lý nhân tài
						</div>
						<div class="clearfix"></div>
						<div class="col-md-6">
							{{ HTML::image('product-service/images/box01.png') }}
							<h2 class="hiring-box-title"><span>Tổng Quan</span></h2>
							<h4 class="tong-description">Giải pháp toàn diện cho nhu cầu tuyển dụng quốc tế</h4>
							<p class="tong-info">
								Là Mạng Việc làm & Tuyển dụng toàn cầu duy nhất tại Việt Nam, Vnjobs.vn tự hào mang đến những giải pháp toàn diện cho nhu cầu tuyển dụng nhân tài từ khắp nơi trên thế giới.
							</p>
						</div>
						<div class="col-md-6">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							<h4 class="tong-description">Nhiều lợi ích cho Doanh nghiệp của bạn</h4>
							<p class="tong-info">
								Dễ dàng kết nối với nhân tài ở nước ngoài thông qua Vnjobs Việt Nam
							</p>
						</div>
					</div> <!-- /.container -->
				</div> <!-- /.row -->
			</div>
			<div class="clearfix"></div>
			<div id="tongquan">
				<div class="row">
					<div class="container dangtuyendung">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-sm-6 tq-left">
									<div class="tq-notice">
										<span>Giải pháp toàn diện cho nhu cầu tuyển dụng quốc tế</span>
									</div>
									<div class="tq-content">
										Là Mạng Việc làm & Tuyển dụng toàn cầu duy nhất tại Việt Nam, Vnjobs.vn tự hào mang đến những giải pháp toàn diện cho nhu cầu tuyển dụng nhân tài từ khắp nơi trên thế giới. Việc tuyển dụng quốc tế của bạn trở nên dễ dàng hơn bao giờ hết với dịch vụ tiên tiến và mạng lưới toàn cầu tại hơn 70 quốc gia của chúng tôi. Bạn có thể đăng tải thông tin tuyển dụng của mình tại các nước có sự hiện diện của Vnjobs, ngay từ Việt Nam.
									</div>
								</div>
								<div class="col-xs-6 tq-right">
									<div class="tq-notice">
										<span>Chủ động kết nối với ứng viên nước ngoài</span>
									</div>
									<div class="tq-content">
										Cơ sở dữ liệu hồ sơ ứng viên ở các nước của Vnjobs sẽ giúp bạn nhanh chóng kết nối và truy cập hơn hàng trăm triệu hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên.Nam.
									</div>
									<a href="{{ URL::route('employers.job.add') }}" class="btn btn-default btn-contact">Liên hệ</a>
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
								<li>
									Dễ dàng kết nối với nhân tài ở nước ngoài thông qua Vnjobs Việt Nam.
								</li>
								<li>Hợp đồng và thủ tục thanh toán đơn giản: Chỉ cần một hợp đồng duy nhất cho tất cả các dịch vụ quốc tế mà bạn sử dụng của Vnjobs.</li>
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