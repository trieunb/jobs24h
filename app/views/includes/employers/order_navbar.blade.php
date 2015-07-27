<div class="widget row management-order">
	<h3>Quản lý đơn hàng</h3>
	<ul class="menu-images-icons">
		<li><a href="{{ URL::route('employers.orders.index', 1) }}">{{ HTML::image('assets/ntd/images/icons-ntd/users.png') }}Đơn hàng đang sử dụng</a></li>
		<li><a href="{{ URL::route('employers.orders.index', 2) }}">{{ HTML::image('assets/ntd/images/chi-tiet.png') }}Đơn hàng hết hạn/Đã sử dụng</a></li>
		<li><a href="{{ URL::route('employers.orders.add') }}">{{ HTML::image('assets/ntd/images/cart.png') }}Mua dịch vụ</a></li>
		<li>
			<div class="col-sm-9 push-top">
				<h4><i class="fa fa-home"></i> {{ $company->company_name }}</h4>	
			</div>
			<div class="col-sm-3 push-top pull-right">
			 	<i class="fa fa-edit"></i><a href="{{ URL::route('employers.account.index') }}" class="text-blue italic decoration">Sửa</a>
			</div>
			<ul class="arrow-square-orange">
				<li>
					<div class="push-padding-10-lr">
						Việc làm đang đăng: <span class="text-orange">{{ $active_job }}</span> vị trí
					</div>
				</li>
				<li>
					<div class="push-padding-10-lr">
						Việc làm chưa sử dụng <span class="text-orange">0</span> vị trí.
					</div>
				</li>
				@if($newest)
				<li>
					<div class="push-padding-10-lr">
						Dịch vụ tìm hồ sơ <span class="text-orange">{{ (($newest->remain && $newest->ended_date>date('Y-m-d'))?$newest->remain:0) }}</span> CV.
					</div>
				</li>
				@endif
			</ul>
			@if($newest)
			@if($newest->ended_date>date('Y-m-d'))
			<div class="push-padding-10-lr clearfix">
				<span class="text-orage">{{ (($newest->remain)?$newest->remain:0) }}</span> CV, <span class="text-orage">{{ (($newest->created_date)?ceil((strtotime($newest->ended_date) - time())/86400):0) }}</span> ngày
				@if($newest->remain) 
					( Từ {{ $newest->created_date }} đến {{ $newest->ended_date }} )
				@endif
			</div>
			@endif
			@endif
		</li>
	</ul>	
</div>
<div class="support clearfix push-top-30">
	<div class="heading-image"></div>	
	<div class="support-info">
		<h2 class="gotham text-align-center text-blue">Chúng tôi sẵn sàng<br>hỗ trợ quý khách</h2>
		{{ HTML::image('assets/ntd/images/ruibu.jpg', null, ['class'=>'push-top']) }}
		<ul>
			<li>
				<h3><strong><i class="fa fa-play text-blue"></i> Bộ phận kinh doanh</strong></h3>
				<ul>
					<li>Tại Hà Nội</li>
					<li class="text-blue">Tel: +84-4-3577-1608</li>
					<li>Tại TP Hồ Chí Minh</li>
					<li class="text-blue">Tel: +84-8-7300-7979</li>
					<li>Tại Đà Nẵng</li>
					<li class="text-blue">Tel: +84-511-394-5676</li>
					<li class="text-blue">Email: sales@vnjobs.vn</li>
				</ul>
			</li>
			<li>
				<h3><strong><i class="fa fa-play text-blue"></i>  Bộ phận Chăm sóc khách hàng</strong></h3>
				<p>Nếu quý khách có thắc mắc nào, vui lòng nhấp vào đây hoặc liên lạc qua đường dây nóng <span class="h3"><strong>1900 585853</strong></span></p>
			</li>
		</ul>

	</div>
</div>