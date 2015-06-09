<span class="bg-blue"><a href="{{URL::route('jobseekers.search-job')}}"><i class="glyphicon glyphicon-search"></i></a></span>
	<span class="bg-orange relative">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
		   	<i class="glyphicon glyphicon-list"></i>
		</a>
	   	<ul class="dropdown-menu" role="menu">
	   		<?php 
	   		if(Sentry::check()){
	   			$count_my_jobs = MyJob::where('ntv_id',$GLOBALS['user']->id)->count();
				$count_applied_job = Application::where('ntv_id',$GLOBALS['user']->id)->count();
				$count_my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->count();
				$count_repond = MyJob::where('ntv_id', $GLOBALS['user']->id)->where('respond','!=','')->count();
				$my_resume = $applied_job = $my_job = $repond = 0;

		   		if(isset($count_my_resume)){
		   			$my_resume = $count_my_resume;
		   		}
		   		if(isset($count_applied_job)){
		   			$applied_job = $count_applied_job;
		   		}
		   		if(isset($count_my_jobs)){
		   			$my_job = $count_my_jobs;
		   		}
		   		if(isset($count_repond)){
		   			$repond = $count_repond;
		   		}
	   		}
	   		
	   		?>
	      	<h3>Quản lý My Jobs</h3>
	      	<li><a href="{{URL::route('jobseekers.edit-basic-info')}}">{{ HTML::image('assets/images/icons/user.png') }} Chỉnh sửa thông tin tài khoản</a></li>
	      	<li><a href="{{URL::route('jobseekers.my-resume')}}">{{ HTML::image('assets/images/icons/profile.png') }} Hồ sơ và thư tự giới thiệu<span class="badge">{{$my_resume}}</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.get-my-resume-by-upload')}}">{{ HTML::image('assets/images/icons/computer.png') }} Hồ sơ tải từ máy tính</a></li>
	      	<li><a href="{{URL::route('jobseekers.my-job')}}">{{ HTML::image('assets/images/icons/jobs.png') }} Việc làm phù hợp với bạn<span class="badge">{{$my_job}}</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.saved-job')}}">{{ HTML::image('assets/images/icons/save.png') }} Việc làm đã lưu<span class="badge">{{$my_job}}</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.applied-job')}}">{{ HTML::image('assets/images/icons/job_submitted.png') }} Việc làm đã nộp<span class="badge">{{$applied_job}}</span></a></li>
	      	<li><a href="#">{{ HTML::image('assets/images/icons/view_profile.png') }} Nhà tuyển dụng xem hồ sơ<span class="badge">0</span></a></li>
	      	<li><a href="{{URL::route('jobseekers.respond-from-employment')}}">{{ HTML::image('assets/images/icons/repond.png') }} Phản hồi của nhà tuyển dụng<span class="badge">{{$repond}}</span></a></li>
	      	<!--<li><a href="ntv-hanchecty.php">{{ HTML::image('assets/images/icons/limit.png') }} Hạn chê công ty xem hồ sơ<span class="badge">2</span></a></li>-->
	      	<li><a href="#">{{ HTML::image('assets/images/icons/interview_letter.png') }} Thư mời phỏng vấn</a></li>
	      	<li><a href="{{URL::route('jobseekers.notification-jobs')}}">{{ HTML::image('assets/images/icons/notify.png') }} Thông báo việc làm</a></li>
	      	<li><a href="{{URL::route('jobseekers.logout')}}">{{ HTML::image('assets/images/icons/log_out.png') }} Thoát</a></li>
	   	</ul>
	</span> 