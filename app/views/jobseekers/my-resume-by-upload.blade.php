@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Hồ Sơ Tải Từ Máy Tính</h2>
				</div>
				<div class="upload-profile-from-com">
					<?php 
						$lastest_up = $my_resume->updated_at;
						$current_date = date('Y-m-d', time());
						$days = ceil((strtotime($current_date) - strtotime($lastest_up)) / (60 * 60 * 24));
					?>
					@if(count($my_resume) == 0)
					<div class="bg-blue row">
						<span class="col-sm-1">{{HTML::image('assets/images/alert.png')}}</span>
						<div class="col-sm-11">
							<h1>Bạn chưa có hồ sơ nào tải lên từ máy tính.</h1>
								Vui lòng tải lên một hồ sơ <button type="button" class="btn btn-info btn-lg">Tải</button>
						</div>
					</div>
					@elseif($days >= 160)
					<div class="bg-blue row">
						<span class="col-sm-1">{{HTML::image('assets/images/alert.png')}}</span>
						<div class="col-sm-11">
							<h1>Hồ sơ tải lên từ máy tính của bạn chưa được cập nhật trong tháng 4.</h1>
							Vui lòng tải lại hồ sơ đã được cập nhật bằng cách chọn <button type="button" class="btn btn-info btn-lg">THAY THẾ</button>
						</div>
					</div>
					@else
					<label class="col-sm-2 control-label">Tên tập tin</label>
					<div class="col-sm-10 decoration"><span class="name-file">{{$my_resume->file_name}}</span>  [<a href='{{ URL::route("jobseekers.download-cv", array($my_resume->id)) }}' class="download_file">Xem</a> | <a href="#">Thay thế</a> | <a href="#">Xóa</a>]</div>
					<div class="clearfix"></div>
					<label class="col-sm-2 control-label">Đã tải</label>
					<div class="col-sm-10">{{$my_resume->created_at}}</div>
					<div class="clearfix"></div>
					<p>Lưu ý: Với các công việc bạn đã ứng tuyển, nhà tuyển dụng có thể xem được phiên bản hồ sơ đã tải mới nhất của bạn <a href="#" class="decoration text-blue">Tìm hiểu thêm</a></p>
					@endif
				</div>
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				<div class="title-page">
					<h2>Việc Làm Gợi Ý</h2>
				</div>
				<div id="searchresult">
				<ul>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>$3000</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/floppy-copy.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/search-job.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/email-job.png"></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						<li>
							<div class="col-sm-2">
								<a href="#"><img src="assets/images/mp.png"></a>
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="#">Lập Trình Viên Java/java Software Programmer (15 Posts In Ho Chi Minh, 10 In Da Nang & 3 In Ha Noi)</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									Penerali Vietnam Life Insurance
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">10/04/2015</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">9587</span>
								</div>
							</div>
							<div class="col-sm-2">
								Hồ Chí Minh
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>$3000</strong>
								</div>
								<div class="share">
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/floppy-copy.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/search-job.png"></a>
									<a href="#" title="Lưu việc làm này"><img src="assets/images/icons/email-job.png"></a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
					</ul>
				</div>
				<a href="#" class="pull-right push-top"><strong>Xem tất cả việc làm tương tự</strong></a>
			</div>
		</div>
	</section>
@stop
@section('scripts')

@stop
