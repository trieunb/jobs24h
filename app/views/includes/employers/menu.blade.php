<nav class="menu-tab">
	<div class="container">
	<ul>
		<li><a href="{{ URL::route('employers.launching') }}">Trang chủ</a>
			<ul>
				<li><a href="">&nbsp;</a></li>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.search.*'], 'active') }}">
			<a href="{{ URL::route('employers.search.basic') }}" onclick="return false;">Tìm hồ sơ</a>
			<ul>
				<div class="container">
				<li class="{{ HTML::active(['employers.search.basic', 'employers.search.postbasic'], 'selected') }}"><a href="{{ URL::route('employers.search.basic') }}">Tìm kiếm nhanh</a></li>
				<li class="{{ HTML::active(['employers.search.advance'], 'selected') }}"><a href="{{ URL::route('employers.search.advance') }}">Tìm kiếm nâng cao</a></li>
				<li class="{{ HTML::active(['employers.search.category'], 'selected') }}"><a href="{{ URL::route('employers.search.category') }}">Tìm theo ngành nghề</a></li>
				
				</div>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.job.add'], 'active') }}"><a href="{{ URL::route('employers.job.add') }}">Đăng tuyển dụng</a>
			<ul>
				<div class="container">
					<li><a href="">&nbsp;</a></li>
				</div>
			</ul>
		</li>
			
		<li class="{{ HTML::active(['employers.jobs.*', 'employers.candidates.*', 'employers.report.*', 'employers.orders.*']) }}">
			<a href="#">Quản lý tuyển dụng</a>
			<ul>
				<div class="container">
				<li class="{{ HTML::active(['employers.orders.index', 'employers.orders.add', 'employers.orders.contact'], 'selected') }}"><a href="{{ URL::route('employers.orders.index') }}">Đơn hàng</a></li>
				<li class="{{ HTML::active(['employers.jobs.*'], 'selected') }}"><a href="{{ URL::route('employers.jobs.index') }}">Quản lý việc làm</a></li>
				<li class="{{ HTML::active(['employers.candidates.*'], 'selected') }}"><a href="{{ URL::route('employers.candidates.job', 'all') }}">Quản lý ứng viên</a></li>
				<li class="{{ HTML::active(['employers.report.candidates'], 'selected') }}"><a href="{{ URL::route('employers.report.candidates') }}">Báo cáo dịch vụ hồ sơ</a></li>
				<li class="{{ HTML::active(['employers.report.alert'], 'selected') }}"><a href="{{ URL::route('employers.report.alert') }}">Thông báo</a></li>
				<li class="{{ HTML::active(['employers.report.respond'], 'selected') }}"><a href="{{ URL::route('employers.report.respond') }}">Phản hồi của UV</a></li>
				<!-- <li class="{{ HTML::active(['employers.report.test'], 'selected') }}"><a href="{{ URL::route('employers.report.test') }}">Bài kiểm tra</a></li> -->
				</div>
			</ul>
		</li>
		<li class="{{ HTML::active(['employers.account.*']) }}">
			<a>Tài khoản</a>
			<ul>
				<div class="container">
				<li class="{{ HTML::active(['employers.account.company'], 'selected') }}"><a href="{{ URL::route('employers.account.index') }}">Cập nhật thông tin</a></li>
				<li class="{{ HTML::active(['employers.account.userinformation'], 'selected') }}"><a href="{{ URL::route('employers.account.userinformation') }}">Thông tin liên hệ</a></li>
				<li class="{{ HTML::active(['employers.account.changepass'], 'selected') }}"><a href="{{ URL::route('employers.account.changepass') }}">Đổi mật khẩu</a></li>
				<li class="{{ HTML::active(['employers.account.changeemail'], 'selected') }}"><a href="{{ URL::route('employers.account.changeemail') }}">Đổi email truy cập</a></li>
				<li class="{{ HTML::active(['employers.account.tasklog'], 'selected') }}"><a href="{{ URL::route('employers.account.tasklog') }}">Báo cáo tác vụ</a></li>
				<li class="{{ HTML::active(['employers.account.respond'], 'selected') }}"><a href="{{ URL::route('employers.account.respond') }}">Thư phản hồi ứng viên</a></li>
				<li class="{{ HTML::active(['employers.account.auto'], 'selected') }}"><a href="{{ URL::route('employers.account.auto') }}">Thư trả lời tự động</a></li>
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