<nav class="menu-tab">
	<div class="container">
	<ul>
		<li><a href="{{ URL::route('employers.launching') }}">Trang chủ</a></li>
		<li>
			<a href="#" onclick="return false;">Tìm hồ sơ</a>
			<ul>
				<div class="container">
				<li><a href="#">Quản lý đăng tuyển</a></li>
				<li><a href="#">Quản lý hồ sơ ứng viên</a></li>
				<li><a href="#">Đơn hàng dịch vụ</a></li>
				<li><a href="#">Báo cáo dịch vụ hồ sơ</a></li>
				<li><a href="#">Quản lý tìm kiếm hồ sơ</a></li>
				<li class="selected"><a href="#">Quản lý tài khoản</a></li>
				<li><a href="#">Mua dịch vụ</a></li>
				</div>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.job.add'], 'active') }}"><a href="{{ URL::route('employers.job.add') }}">Đăng tuyển dụng</a></li>
		<li class="{{ HTML::active(['employers.jobs.*', 'employers.candidates.*']) }}">
			<a href="#">Quản lý tuyển dụng</a>
			<ul>
				<div class="container">
				<li><a href="#">Đơn hàng</a></li>
				<li class="{{ HTML::active(['employers.jobs.*'], 'selected') }}"><a href="{{ URL::route('employers.jobs.index') }}">Quản lý việc làm</a></li>
				<li class="{{ HTML::active(['employers.candidates.*'], 'selected') }}"><a href="{{ URL::route('employers.candidates.job', 'all') }}">Quản lý ứng viên</a></li>
				<li class="{{ HTML::active(['employers.candidates.report'], 'selected') }}"><a href="{{ URL::route('employers.candidates.report') }}">Báo cáo dịch vụ hồ sơ</a></li>
				<li class="{{ HTML::active(['employers.candidates.alert'], 'selected') }}"><a href="{{ URL::route('employers.candidates.alert') }}">Thông báo hồ sơ</a></li>
				<li class="{{ HTML::active(['employers.candidates.respond'], 'selected') }}"><a href="{{ URL::route('employers.candidates.respond') }}">Phản hồi của UV</a></li>
				<li class="{{ HTML::active(['employers.candidates.test'], 'selected') }}"><a href="{{ URL::route('employers.candidates.test') }}">Bài kiểm tra</a></li>
				</div>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.account.*']) }}">
			<a>Tài khoản</a>
			<ul>
				<div class="container">
				<li class="{{ HTML::active(['employers.account.company'], 'selected') }}"><a href="{{ URL::route('employers.account.index') }}">Cập nhật thông tin</a></li>
				<li class="{{ HTML::active(['employers.account.changepass'], 'selected') }}"><a href="{{ URL::route('employers.account.changepass') }}">Đổi mật khẩu</a></li>
				<li class="{{ HTML::active(['employers.account.changeemail'], 'selected') }}"><a href="{{ URL::route('employers.account.changeemail') }}">Đổi email truy cập</a></li>
				<li><a href="{{ URL::route('employers.account.logout') }}">Thoát</a></li>
				</div>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.hiring.*']) }}">
			<a href="#">Tư vấn tuyển dụng</a>
			<ul>
				<div class="container">
				<li class="selected"><a href="#">Việc làm của tôi</a></li>
				<li><a href="#">Resume xem</a></li>
				<li><a href="#">Các ứng viên của tôi</a></li>
				<li><a href="#">Tư vấn tuyển dụng</a></li>
				</div>
			</ul>
		</li>
	</ul>
	</div>
</nav>