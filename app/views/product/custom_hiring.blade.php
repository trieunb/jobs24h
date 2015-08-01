@extends('layouts.product')

@section('primary')
<div id="hiring-event">
				<div class="row">
					<div class="container text-center">
						<h1 class="hiring-title">Custom Hiring <span class="text-orange">Event</span></h1>
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
							<h4 class="tong-description">Sự kiện tuyển dụng hoàn hảo của riêng bạn</h4>
							<p class="tong-info">
								Tự hào là nhà tổ chức sự kiện về tuyển dụng chuyên nghiệp nhất cả nước, Vnjobs thực hiện những sự kiện tuyển dụng hoàn hảo riêng cho từng doanh nghiệp...
							</p>
						</div>
						<div class="col-md-6">
							{{ HTML::image('product-service/images/box02.png') }}
							<h2 class="hiring-box-title"><span>Lợi ích</span></h2>
							
							<p class="tong-info">
								Tối ưu hóa tài nguyên của Vnjobs: chúng tôi tự hào có mạng lưới rộng lớn ứng viên chất lượng cao và kênh thông tin chuyên biệt cho tuyển dụng.
							</p>
						</div>
					</div> <!-- /.container -->
				</div> <!-- /.row -->
			</div>
			<div class="clearfix"></div>
			<div id="tongquan">
				<div class="row">
					<div class="container">
						<div class="col-sm-12">
							<h1 class="tq-title text-center">Tổng <span class="text-orange">Quan</span></h1>
							<div class="text-center">
								{{ HTML::image('product-service/images/sep01.png') }}
							</div>
							<div class="row">
								<div class="col-sm-6 tq-left">
									<div class="tq-notice">
										<span>Sự kiện tuyển dụng hoàn hảo của riêng bạn</span>
									</div>
									<div class="tq-content">
										Tự hào là nhà tổ chức sự kiện về tuyển dụng chuyên nghiệp nhất cả nước, Vnjobs thực hiện những sự kiện tuyển dụng hoàn hảo riêng cho từng doanh nghiệp. Cơ hội tuyệt vời để cô đọng cả quy trình tuyển dụng phức tạp chỉ trong một ngày mà vẫn bảo đảm chất lượng ứng viên tuyệt vời!
									</div>
									<a href="#" class="btn btn-default btn-contact">Liên hệ</a>
								</div>
								<div class="col-xs-6">
									{{ HTML::image('product-service/images/tq-image.png', 'image', ['class'=>'image-full']) }}
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
							{{ HTML::image('product-service/images/uf-image-left.png', 'image', ['class'=>'image-full']) }}
						</div>
						<div class="uf-right">
							<ul class="loi-ich">
								<li>
									<span>Tối ưu hóa tài nguyên của Vnjobs: chúng tôi tự hào có mạng lưới rộng lớn ứng viên chất lượng cao và kênh thông tin chuyên biệt cho tuyển dụng.</span>
								</li>
								<li>Không còn phải lo lắng về việc tổ chức sự kiện: tất cả sẽ do chúng tôi phụ trách.</li>
								<li>Không còn phải lo lắng về việc tổ chức sự kiện: tất cả sẽ do chúng tôi phụ trách.</li>
								<li>Cơ hội phát triển thương hiệu tuyển dụng: tạo ấn tượng mạnh mẽ cho ứng viên và tối ưu độ phủ trên các kênh truyền thông.</li>
								<li>Linh hoạt, hiệu quả và chặt chẽ: trong toàn bộ quá trình tổ chức.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

@stop