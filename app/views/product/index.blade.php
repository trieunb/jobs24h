@extends('layouts.product')
@section('title') Talent Driver @stop
@section('primary')
<div id="main-slide">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 col-xs-offset-8">
							<div class="row">
								<div class="col-xs-12 head-info span3 wow bounceInRight animated" >
									Đến với chúng tôi để 
									có những sản phẩm 
									& dịch vụ tốt nhất!!!
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 head-bottom wow bounceInRight animated" data-wow-duration="1s" data-wow-delay=".5s">
									<h2 class="head-bottom-title">sản phẩm & dịch vụ</h2>
									<div class="head-bottom-text">
										VnJobs.vn gửi đến quý khách hàng 
										những dịch vụ đang hot và cần thiết. 
										Rất hân hạnh được phục vụ!
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="services">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="text-center">
								Dịch vụ
							</h1>
							<div class="sep02"></div>
							<h3 class="text-center">
								VnJobs.vn gửi đến quý khách hàng những dịch vụ đang hot và cần thiết.<br> 
				Rất hân hạnh được phục vụ!
							</h3>
						</div>
					</div> <!-- end dich vu -->
					<div class="row">
						<div class="col-xs-4 wow bounceInLeft animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.job_add') }}"><span class="fa fa-magic"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.job_add') }}">Đăng Tuyển Dụng</a></h4>
								<div class="box-info">Xây dựng đội ngũ nhân tài cho doanh nghiệp</div>
								<div class="box-description">Thông tin đăng tuyển của bạn sẽ hiển thị trực tuyến trên <a href="http://vnjobs.vn">VnJobs.vn</a> và các trang đối tác của chúng tôi trong vòng 30 ngày.</div>
							</div>
						</div>
						<div class="col-xs-4 wow bounceInUp center animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.find_resume') }}"><span class="fa fa-search"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.find_resume') }}">Tìm hồ sơ ứng viên</a></h4>
								<div class="box-info">Không bỏ lỡ nhân tài</div>
								<div class="box-description">Truy cập vào hàng trăm ngàn hồ sơ hoàn chỉnh và được cập nhật mới thường xuyên để tìm kiếm những ứng viên phù hợp nhất với vị trí tuyển dụng.</div>
							</div>
						</div>
						<div class="col-xs-4 wow bounceInRight animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.talent') }}"><span class="fa fa-gift"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.talent') }}">Talent Solution</a></h4>
								<div class="box-info">Kết nối, tuyển dụng & quản lý nhân tài</div>
								<div class="box-description">Talent Solution – giải pháp tuyển dụng toàn diện dành cho doanh nghiệp được sáng tạo độc quyền bởi <a href="http://vnjobs.vn">VnJobs.vn</a></div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-xs-4 wow bounceInLeft animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.marketing') }}"><span class="fa fa-star"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.marketing') }}">quảng bá thông tin tuyển dụng</a></h4>
								<div class="box-info">Tạo sự khác biệt cho thương hiệu công ty</div>
								<div class="box-description">Thông tin tuyển dụng của bạn sẽ nổi bật hơn nhờ nội dung đăng tuyển được thiết kế hấp dẫn nhấn mạnh văn hóa và thương hiệu công ty.</div>
							</div>
						</div>
						<div class="col-xs-4 wow bounceInUp center animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.advertising') }}"><span class="fa fa-desktop"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.advertising') }}">Quảng cáo tuyển dụng</a></h4>
								<div class="box-info">Xây dựng thương hiệu tuyển dụng <br>
ấn tượng trong mắt ứng viên</div>
								<div class="box-description">Quảng cáo tuyển dụng có thể thu hút sự chú ý của các ứng viên tài năng nhờ gắn liên kết trực tiếp đến thông tin tuyển dụng của bạn trên Logo hoặc Banner.</div>
							</div>
						</div>
						<div class="col-xs-4 wow bounceInRight animated">
							<div class="boxes">
								<div class="box-icons">
									<a href="{{ URL::route('product.submit_resume') }}"><span class="fa fa-paint-brush"></span></a>
								</div>
								<div class="clearfix"></div>
								<h4 class="text-center"><a href="{{ URL::route('product.submit_resume') }}">Đăng tuyển dụng &tìm HS Quốc tế</a></h4>
								<div class="box-info">Giải pháp quốc tế cho nhu cầu tuyển dụng</div>
								<div class="box-description"><a href="http://vnjobs.vn" target="_blank">VnJobs.vn</a> tự hào mang đến những giải pháp toàn diện cho nhu cầu tuyển dụng nhân tài từ khắp nơi trên thế giới.</div>
							</div>
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