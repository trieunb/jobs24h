<span class="bg-blue"><a href="#"><i class="glyphicon glyphicon-search"></i></a></span>
	<span class="bg-orange relative">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
		   	<i class="glyphicon glyphicon-list"></i>
		</a>
	   	<ul class="dropdown-menu" role="menu">
	      	<h3>Quản lý My Jobs</h3>
	      	<li><a href="{{URL::route('jobseekers.edit-basic-info')}}">{{ HTML::image('assets/images/icons/user.png') }} Chỉnh sửa thông tin tài khoản</a></li>
	      	<li><a href="{{URL::route('jobseekers.my-resume')}}">{{ HTML::image('assets/images/icons/profile.png') }} Hồ sơ và thư tự giới thiệu</a></li>
	      	<li><a href="#">{{ HTML::image('assets/images/icons/computer.png') }} Hồ sơ tải từ máy tính</a></li>
	      	<li><a href="{{URL::route('jobseekers.my-job')}}">{{ HTML::image('assets/images/icons/jobs.png') }} Việc làm phù hợp với bạn<span class="badge">2</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.saved-job')}}">{{ HTML::image('assets/images/icons/save.png') }} Việc làm đã lưu<span class="badge">2</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.applied-job')}}">{{ HTML::image('assets/images/icons/job_submitted.png') }} Việc làm đã nộp<span class="badge">2</span></a></li>
	      	<li><a href="#">{{ HTML::image('assets/images/icons/view_profile.png') }} Nhà tuyển dụng xem hồ sơ<span class="badge">2</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.respond-from-employment')}}">{{ HTML::image('assets/images/icons/repond.png') }} Phản hồi của nhà tuyển dụng<span class="badge">2</span></a></li>
	      	<!--<li><a href="ntv-hanchecty.php">{{ HTML::image('assets/images/icons/limit.png') }} Hạn chê công ty xem hồ sơ<span class="badge">2</span></a></li>-->
	      	<li><a href="#">{{ HTML::image('assets/images/icons/interview_letter.png') }} Thư mời phỏng vấn</a></li>
	      	<li><a href="#">{{ HTML::image('assets/images/icons/notify.png') }} Thông báo việc làm</a></li>
	      	<li><a href="#">{{ HTML::image('assets/images/icons/log_out.png') }} Thoát</a></li>
	   	</ul>
	</span> 