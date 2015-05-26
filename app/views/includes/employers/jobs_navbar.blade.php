
<div class="widget row">
	<h3>Tuyển dụng</h3>
	<ul class="menu-images-icons">
		<li>
			<a href="{{ URL::route('employers.jobs.active') }}">
				{{ HTML::image('assets/ntd/images/eyes-open.png') }} Đang hiển thị ({{ $job_count['active'] }})
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.expiring') }}">
				{{ HTML::image('assets/ntd/images/calendar-2.png') }} Sắp hết hạn trong 7 ngày ({{ $job_count['expiring'] }})
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.inactive') }}">
				{{ HTML::image('assets/ntd/images/list-sm.png') }} Danh sách đang chờ ({{ $job_count['inactive'] }})
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.isapply') }}">
				{{ HTML::image('assets/ntd/images/pause.png') }} Tạm ngưng nhận hồ sơ ({{ $job_count['isapply'] }})
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.expired') }}">
				{{ HTML::image('assets/ntd/images/oclock.png') }} Hết hạn đăng tuyển ({{ $job_count['expired'] }})
			</a>
		</li>
		<li>
			<a href="{{ URL::route('employers.jobs.index') }}">
				{{ HTML::image('assets/ntd/images/all-email.png') }} Tất cả việc làm ({{ $job_count['all'] }})
			</a>
		</li>
		
	</ul>
</div>