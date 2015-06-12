
<div class="widget row">
	<h3>Thông tin tài khoản</h3>
	<ul class="menu-images-icons">
		<li>
			<a href="{{ URL::route('employers.account.usermanager') }}">
				{{ HTML::image('assets/ntd/images/icon-user.png') }} Quản lý User
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.account.index') }}">
				{{ HTML::image('assets/ntd/images/icon-company.png') }} Thông tin công ty
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.account.userinformation') }}">
				{{ HTML::image('assets/ntd/images/icon-information.png') }} Thông tin liên hệ
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.account.tasklog') }}">
				{{ HTML::image('assets/ntd/images/icon-logs.png') }} Báo cáo tác vụ
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.account.changepass') }}">
				{{ HTML::image('assets/ntd/images/icon-lock.png') }} Đổi mật khẩu
			</a>
		</li>
		
	</ul>
</div>


<div class="widget row">
	<h3>Email mẫu</h3>
	<ul class="menu-images-icons">
		<li>
			<a href="{{ URL::route('employers.account.respond') }}">
				{{ HTML::image('assets/ntd/images/icon-respond.png') }} Thư phản hồi ứng viên
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.account.auto') }}">
				{{ HTML::image('assets/ntd/images/icon-auto.png') }} Thông trả lời tự động
			</a>
		</li>
		
	</ul>
</div>


<div class="widget row">
	<h3>Tìm tác vụ</h3>
	<ul class="menu-images-icons">
		<li>
			<a href="{{ URL::route('employers.jobs.active') }}">
				{{ HTML::image('assets/ntd/images/icon-useralone.png') }} Người tác vụ
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.expiring') }}">
				{{ HTML::image('assets/ntd/images/icon-created_date.png') }} Ngày tạo
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.inactive') }}">
				{{ HTML::image('assets/ntd/images/icon-cursor.png') }} loại thao tác
			</a>
		</li>
		
		
	</ul>
</div>