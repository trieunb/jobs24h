<h3 class="sidebar-title">Tuyển dụng</h3>
								<div class="sidebar-info">
									<span class="info-des">
										{{ HTML::linkRoute('employers.jobs.active', 'Đang hiển thị') }} ({{ $job_count['active'] }})
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										{{ HTML::linkRoute('employers.jobs.expiring', 'Sắp hết hạn trong 7 ngày') }} ({{ $job_count['expiring'] }})
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										{{ HTML::linkRoute('employers.jobs.inactive', 'Danh sách chờ đăng') }} ({{ $job_count['inactive'] }})
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
									</span>
										{{ HTML::linkRoute('employers.jobs.isapply', 'Tạm ngưng nhận hồ sơ') }} ({{ $job_count['isapply'] }})
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										{{ HTML::linkRoute('employers.jobs.expired', 'Hết hạn đăng tuyển') }} ({{ $job_count['expired'] }})
									</span>
								</div>
								<div class="sidebar-info">
									<span class="info-des">
										{{ HTML::linkRoute('employers.jobs.index', 'Tất cả việc làm') }} ({{ $job_count['all'] }})
									</span>
								</div>