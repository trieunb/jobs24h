@extends('layouts.launchinglayout')
@section('title') Trang chủ Nhà tuyển dụng - VnJobs @stop
@section('content')
<div class="col-xs-12 main-content">
							<div class="jumbotron">
								<h2 class="text-center">Giúp <span class="heading-text">doanh nghiệp</span> của bạn vươn xa</h2>
								<center>
									{{ HTML::link(URL::route('employers.login'), 'Đăng Nhập', array('class'=>'btn btn-vnjob btn-color btn-radius btn-primary') ) }}
									{{ HTML::link(URL::route('employers.register'), 'Đăng Ký', array('class'=>'btn btn-vnjob btn-transparent btn-radius btn-primary') ) }}
								</center>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- wrapper -->

			<div class="clearfix"></div>
			<div class="sales">
				<div class="full-page">
					<div class="row">
						<div class="col-xs-6 center">
							<h3 class="sales-title">Đăng Tuyển</h3>
							<div class="center divider clearfix"></div>
							<h4 class="sales-info">TRANG WEB TUYỂN DỤNG HÀNG ĐẦU VIỆT NAM</h4>
							<ul class="package-list package1">
								<li>Đảm bảo hài lòng 100%</li>
								<li>Đăng tuyển nhanh chóng và nhận hồ sơ ngay lập tức</li>
								<li>Tối ưu cho máy vi tính, máy tính bảng và điện thoại di động</li>
							</ul>
							<div class="clearfix"></div>
							<button type="button" class="btn btn-buynow btn-default">Mua ngay</button>
						</div>

						<div class="col-xs-6 center">
							<h3 class="sales-title">Tìm hồ sơ</h3>
							<div class="center divider-green clearfix"></div>
							<h4 class="sales-info">Tìm ứng viên tốt nhất trong thời gian nhanh nhất</h4>
							<ul class="package-list package2">
								<li>30 ngày truy cập không giới hạn vào hệ thống dữ liệu </li>
								<li>chuyên nghiệp</li>
								<li>Tìm ứng viên hiệu quả và nhanh chóng</li>
							</ul>
							<div class="clearfix"></div>
							<button type="button" class="btn btn-trial btn-default">Tìm kiếm thử</button>
							<span class="buynow">
								Hoặc <a href="#">Mua ngay</a>
							</span>
						</div>
					</div> <!-- row -->
					
				</div>
			</div> <!-- .sales -->
			<div class="newest-sale">
				<div class="full-page">
					<h4 class="sale-title">
						(<span class="text-required">*</span>) Chương trình giảm giá đặc biệt này kéo dài tới ngày 30 Tháng 4 và chỉ áp dụng cho đơn hàng trực tuyến. (Không áp dụng với các chương trình khuyến mãi khác).
					</h4>
				</div>
			</div>
			<div class="super-divider2"></div>
			<div class="focus-boxes">
				<div class="container">
					<div class="col-xs-4">
						{{ HTML::image('assets/ntd/images/developer.jpg', 'employers', array('class'=>'img-circle box-image') ) }}
						<h4 class="box-title">Trang tuyển dụng<br>chuyên nghiệp</h4>
					</div>
					<div class="col-xs-4">
						{{ HTML::image('assets/ntd/images/developer.jpg', 'employers', array('class'=>'img-circle box-image') ) }}
						<div class="note-text">1.600</div>
						<h4 class="box-title">lượt xem<br>mỗi đăng tuyển</h4>
					</div>
					<div class="col-xs-4">
						{{ HTML::image('assets/ntd/images/developer.jpg', 'employers', array('class'=>'img-circle box-image') ) }}
						<div class="note-text">2.500.000</div>
						<h4 class="box-title">Ứng viên tiềm năng</h4>
					</div>
				</div>
			</div>
			<div class="customer-respond">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 center">
							<h2 class="respond-title">
								Khách hàng đánh giá
							</h2>
							<div class="respond-note">
								Hãy lắng nghe cảm nhận của họ
							</div>
							<div class="clearfix"></div>
							<div class="mini-divider"></div>
							<div class="boxes">
								<div class="col-xs-4">
									{{ HTML::image('assets/ntd/images/box01.png' ) }}
									<div class="box-info">
										"Sự quan tâm tận tình<br>của VNjobs thật sự khác biệt"
									</div>
									<small class="pull-right">Gabriel Gavasso, ThoughtWorks</small>
								</div>
								<div class="col-xs-4">
									{{ HTML::image('assets/ntd/images/box02.png' ) }}
									<div class="box-info">
										"Chúng tôi đã tuyển<br>được những chuyên gia giỏi nhất"
									</div>
									<small class="pull-right">Thu Hue, Transimex Sai Gon </small>
								</div>
								<div class="col-xs-4">
									{{ HTML::image('assets/ntd/images/box03.png' ) }}
									<div class="box-info">
										"VNjobs tư vấn rất chu đáo,<br>nhiệt tình và đáng tin cậy"
									</div>
									<small class="pull-right">Minh Trang, Edge Marketing </small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- customer-respond -->
			<div class="super-divider2"></div>
			<div class="more-info">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 center">
							<h2 class="info-title">Chúng tôi cam kết</h2>
							<div class="short-description">
								Đảm bảo hài lòng, hoặc miễn phí đăng lại tin tuyển dụng
							</div>
							<div class="clearfix"></div>
							<div class="mini-divider"></div>
							<div class="full-description">
								Tuyển dụng tại Việt Nam là một việc đầy thử thách, vì thế chúng tôi luôn sẵn sàng hỗ trợ Quý khách. Nếu như Quý khách không hài lòng 100% với dịch vụ đăng tin tuyển dụng của VNjobs, hãy liên lạc với chuyên viên tư vấn của chúng tôi HCM: 08 3925 8456 / HN: 043944 0568 hoặc gửi thư về jobsupport@VNjobs.vn để yêu cầu được đăng lại miễn phí (không bao gồm các dịch vụ ưu tiên) trong vòng 10 ngày làm việc kể từ khi tin đăng tuyển có trả phí của Quý khách hết hạn.
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="wrapper">
				<div class="head-main">
					<div class="page">
						<div class="col-xs-12">

						</div>

@stop