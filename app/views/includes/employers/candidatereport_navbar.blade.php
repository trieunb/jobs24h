<div class="widget row">
	<h3>Công ty TNHH Minh Phúc <a href="{{ URL::route('employers.account.index') }}" class="text-blue decoration">Sửa</a></h3>
	<ul class="menu-images-icons">
		<li>Việc làm đang đăng: <span class="text-orange">{{ $active_job }}</span> vị trí</li>
		<li>Việc làm chưa sử dụng <span class="text-orange">0</span> vị trí.</li>
		@if($newest)
		<li>Dịch vụ tìm hồ sơ <span class="text-orange">{{ (($newest->remain && date('Y-m-d', strtotime($newest->ended_date) ))?$newest->remain:0) }}</span> CV.</li>
		@endif
	</ul>
	@if($newest)
	@if(date('Y-m-d', strtotime($newest->ended_date) ))

	<span class="text-orage">{{ (($newest->remain && date('Y-m-d', strtotime($newest->ended_date) ))?$newest->remain:0) }}</span> CV
		, <span class="text-orage">{{ (($newest->created_date)?ceil((strtotime($newest->ended_date) - time())/86400):0) }}</span> ngày
		( Từ {{ $newest->created_date }} đến {{ $newest->ended_date }} )
	@endif
	@endif
</div>
<div class="widget row management-order">
	<h3>Quản lý đơn hàng</h3>
	<ul class="menu-images-icons">
		<li><a href="{{ URL::route('employers.report.candidates', 1) }}">{{ HTML::image('assets/ntd/images/icons-ntd/users.png') }}Đơn hàng đang sử dụng</a></li>
		<li><a href="{{ URL::route('employers.report.candidates', 2) }}">{{ HTML::image('assets/ntd/images/chi-tiet.png') }}Đơn hàng hết hạn/Đã sử dụng</a></li>
		<li><a href="{{ URL::route('employers.orders.add') }}">{{ HTML::image('assets/ntd/images/cart.png') }}Mua dịch vụ</a></li>
		<!-- <li>
			<div class="col-sm-9 push-top">
				<h4><i class="fa fa-home"></i> Công ty TNHH Minh Phúc</h4>	
			</div>
			<div class="col-sm-3 push-top pull-right">
			 	<i class="fa fa-edit"></i><a href="{{ URL::route('employers.account.index') }}" class="text-blue italic decoration">Sửa</a>
			</div>
			<ul class="arrow-square-orange">
				<li>
					<div class="push-padding-10-lr">
						Việc làm đang đăng: <span class="text-orange">0</span> vị trí
					</div>
				</li>
				<li>
					<div class="push-padding-10-lr">
						Việc làm chưa sử dụng <span class="text-orange">0</span> vị trí.
					</div>
				</li>
				<li>
					<div class="push-padding-10-lr">
						Dịch vụ tìm hồ sơ <span class="text-orange">0</span> CV.
					</div>
				</li>
			</ul>
			<div class="push-padding-10-lr clearfix">
				<span class="text-orage">0</span> CV, <span class="text-orage">19</span> ngày
				(Từ 24/04/2015 - 23/05/2015)
			</div>
		</li> -->
	</ul>	
</div>
