
<div class="widget row">
	<h3>Thông tin tài khoản</h3>
	<ul class="menu-images-icons">
		<!-- <li>
			<a href="{{ URL::route('employers.account.usermanager') }}">
				{{ HTML::image('assets/ntd/images/icon-user.png') }} Quản lý User
			</a>
		</li> -->
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
				{{ HTML::image('assets/ntd/images/icon-auto.png') }} Thư trả lời tự động
			</a>
		</li>
		
	</ul>
</div>

@if(Route::is('employers.account.tasklog'))
<div class="widget row">
	<h3>Tìm tác vụ</h3>
	<ul class="menu-images-icons">
		<li>
			<a class="" role="button" data-toggle="collapse" href="#nguoitacvu"aria-expanded="false" aria-controls="nguoitacvu">
				{{ HTML::image('assets/ntd/images/icon-useralone.png') }} Người tác vụ
			</a>
			<div class="collapse in" id="nguoitacvu">
				<select name="nguoitacvu" id="inputNguoitacvu" class="form-control">
					<option value="1">{{ Auth::getUser()->full_name }}</option>
				</select>
			</div>
		</li>
		<li>
			<a class="" role="button" data-toggle="collapse" href="#ngaytao" aria-expanded="false" aria-controls="ngaytao">
				{{ HTML::image('assets/ntd/images/icon-created_date.png') }} Ngày tạo
			</a>
		</li>
		<li>
			<a class="" role="button" data-toggle="collapse" href="#loaithaotac" aria-expanded="false" aria-controls="loaithaotac">
				{{ HTML::image('assets/ntd/images/icon-cursor.png') }} loại thao tác
			</a>
		</li>
		
		
	</ul>
</div>
@endif