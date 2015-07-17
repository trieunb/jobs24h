@extends('layouts.cungunglaodong')
@section('title') Trang chủ Cung ứng lao động - VnJobs @stop
 
@section('content')
			<section class="content">
				<div class="labor-supply">
					<div class="container">
						<h2 class="title">Cung ứng lao động</h2>
						<h3 class="desc"><a href="#">VnJobs.vn</a> cung cấp dịch vụ đa dạng mang lại giá trị gia tăng cho khách hàng dựa trên tôn chỉ<br>"TÔN TRỌNG LÀ THÀNH CÔNG"</h3>
						<div class="col-sm-3">
							{{HTML::image('cungunglaodong/assets/images/icon_1.png')}}
							 
							<h3>Thuê ngoài nhân sự</h3>
							<p>Bản thân khách hàng đôi lúc vẫn cảm thấy thiếu hụt về chuyên môn hay kinh nghiệm trong một lĩnh vực hoạt động nào đó...</p>
						</div>
						<div class="col-sm-3">
						{{HTML::image('cungunglaodong/assets/images/icon_2.png')}}
							 
							<h3>Dịch vụ tuyển dụng</h3>
							<p>Để mang lại lợi ích lớn nhất cho khách hàng, chúng tôi đã xây dựng và cam kết 5 tiêu chí trong cung cấp dịch vụ tuyển dụng cho khách hàng...</p>
						</div>
						<div class="col-sm-3">
							{{HTML::image('cungunglaodong/assets/images/icon_3.png')}}
							<h3>Dịch vụ Head Hunting</h3>
							<p>Xuất hiện không quá lâu nhưng cụm từ Headhunting hay HeadHunter ngày càng quen thuộc Headhunting là cụm từ chỉ việc những người làm...</p>
						</div>
						<div class="col-sm-3">
							{{HTML::image('cungunglaodong/assets/images/icon_4.png')}}
							<h3>Dịch vụ đào tạo</h3>
							<p>Trong bối cảnh môi trường kinh doanh thay đổi với tốc độ ngày càng nhanh, việc chú trọng phát triển năng lực con người thông qua đào tạo...</p>
						</div>
					</div>
				</div>
				<div class="about-us bg-silver">
					<div class="container">
						<h2 class="title">Giới thiệu</h2>
						<div class="col-sm-3">
							<div id="carousel" class="carousel slide" data-ride="carousel">
								  <!-- Indicators -->
								  <ol class="carousel-indicators">
								    <li data-target="#carousel" data-slide-to="0" class="active"></li>
								    <li data-target="#carousel" data-slide-to="1"></li>
								    <li data-target="#carousel" data-slide-to="2"></li>
								  </ol>

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								    {{HTML::image('cungunglaodong/assets/images/banner_recuitment.png')}}
								       
								      <div class="carousel-caption">
								      	<span class="date">December 4, 2014</span>
								      	 {{HTML::image('cungunglaodong/assets/images/before_quote.png')}}
								      	 
								        <p>Chào mừng Khách hàng đến với dịch vụ cung ứng lao động Với kinh nghiệm hoàn thành tuyển dụng đội ngũ quản lý và nhân viên cho các đối tác chiến lược bao gồm các công ty như viettel, vinaphone, bidv...</p>
								      </div>
								    </div>
								    <div class="item">
								    	{{HTML::image('cungunglaodong/assets/images/banner_recuitment.png')}}
								       
								      <div class="carousel-caption">
								      	<span class="date">December 4, 2014</span>
								      	{{HTML::image('cungunglaodong/assets/images/before_quote.png')}}
								        <p>Chào mừng Khách hàng đến với dịch vụ cung ứng lao động Với kinh nghiệm hoàn thành tuyển dụng đội ngũ quản lý và nhân viên cho các đối tác chiến lược bao gồm các công ty như viettel, vinaphone, bidv...</p>
								      </div>
								    </div>
								  </div>
							</div>	
						</div>
						<div class="col-sm-8">
							<span class="upp-first-letter">C</span>
							<p>
								hào mừng Khách hàng đã đến với dịch vụ Cung ứng lao động của VnJobs.vn. Với kinh nghiệm hoàn thành tuyển dụng đội ngũ quản lý và nhân viên cho các đối tác chiến lược bao gồm các công ty như Viiettel, Vinaphone, BIDV...
								<br /><br />VnJobs.vn đã bước đầu thành công trong việc phát triển đội ngũ nhân sự với các chuyên viên tuyển dụng đến từ các công ty cung cấp nhân sự lớn trên thị trường, song song với họ là những chuyên viên tuyển dụng tới từ các công ty lớn trong các ngành Tài chính, sản xuất và dịch vụ.
								<br />Đồng thời với việc phát triển đội ngũ nhân sự, VnJobs.vn cũng đã thành công trong việc xây dựng kho dữ liệu ứng viên đa dạng ngành nghề nhằm giúp khách hàng tiếp cận đúng và hiệu quả với ứng viên mà họ đang tìm kiếm. Với 7 dịch vụ: Dịch vụ quản lý nhân sự, dịch vụ tuyển dụng, dịch vụ Đào tạo nhân sự, dịch vụ lương và chế độ, dịch vụ Head Hunting.
							</p>
							<ul class="push-top">
								<li>
								<a href="{{URL::route('cungunglaodong.detail','9')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_photo.png')}}
								 
								</span> Quản lý nhân sự</a></li>
								<li>
								<a href="{{URL::route('cungunglaodong.detail','3')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_paint.png')}}
								 </span> Đào tạo nhân sự</a></li>
								<li>
								<a href="{{URL::route('cungunglaodong.detail','8')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_gift.png')}}
								 </span> Lương và chế độ</a></li>
								<li>
								<a href="{{URL::route('cungunglaodong.detail','6')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_cart.png')}}
								</span> Tuyển dụng</a></li>
								<li>
								<a href="{{URL::route('cungunglaodong.detail','7')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_user.png')}}
								 </span> Giải pháp lao động</a></li>
								<li>
								<a href="{{URL::route('cungunglaodong.detail','5')}}"><span>
								{{HTML::image('cungunglaodong/assets/images/icon_human.png')}}
								 </span> Thuê ngoài nhân sự</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="partners">
					<div class="container">
						<h2 class="title text-white">Đối tác</h2>
						<ul>
							@foreach($data as $value)
							<li class="col-sm-3">
								<a href="{{$value['link']}}" target="_blank" title="{{$value['name']}}">{{HTML::image(URL::to('uploads/cungunglaodong/'.$value['thumbnail'].''),$value['name'])}}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="customer-review">
					<div id="carousel-custom" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
								    <div class="item active">
								    {{HTML::image('cungunglaodong/assets/images/logo.png')}}	
								      
								      <div class="carousel-caption">
										<blockquote class="container">
											<h2 class="italic">Tối rất ấn tượng với đội ngũ giảng viên của MP Telecom rất trẻ trung nhưng lại giàu kinh nghiệm và phương pháp truyền đạt tốt.</h2>
											<span class="text-elegant">Ms.Hồng Liên</span>
											<span>Trưởng phòng Dịch vụ khách hàng của Trung tâm thẻ, Ngân Hàng Agribank</span>
										</blockquote>							      	
								      </div>
								    </div>
								    <div class="item">
								      {{HTML::image('cungunglaodong/assets/images/logo.png')}}	
								      <div class="carousel-caption">
								      	<blockquote class="container">
											<h2 class="italic">Tối rất ấn tượng với đội ngũ giảng viên của MP Telecom rất trẻ trung nhưng lại giàu kinh nghiệm và phương pháp truyền đạt tốt.</h2>
											<span class="text-elegant">Ms.Hồng Liên</span>
											<span>Trưởng phòng Dịch vụ khách hàng của Trung tâm thẻ, Ngân Hàng Agribank</span>
										</blockquote>		
								      </div>
								    </div>
								  </div>
								   <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
							    	{{HTML::image('cungunglaodong/assets/images/prev.png')}}	

							  </a>
							  <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
								    {{HTML::image('cungunglaodong/assets/images/next.png')}}
								   
							  </a>
						</div>	
				</div>
			</section>
			@stop