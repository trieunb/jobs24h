@extends('layouts.jobseeker')
@if($job != null)
	@section('title_fb'){{$job->vitri}}@stop
	@section('desc_fb'){{$job->mota}}@stop
	@section('title'){{$job->vitri}}@stop
@else
	@section('title')Không tìm thấy việc làm@stop
	@section('title_fb')Không tìm thấy việc làm@stop
@endif
@section('img_fb'){{URL::asset('assets/images/vnjobs_social.jpg')}}@stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
			@if($job != null)
			<div class="boxed">
				<div class="details">
					<div class="top">
						<input type="hidden" name="ntd_id" class="ntd_id" value="{{$job->ntd->id}}">
						<h1>{{$job->vitri}}</h1>	
					</div>
					<div class="meta-jobs">
						<div class="single-post-meta">
							Cập nhật: {{date('d-m-Y', strtotime($job->updated_at))}}&nbsp;&nbsp;|&nbsp;&nbsp;Lượt xem: {{$job->luotxem}}
						</div> 
						<div class="pull-right"><div style="margin: 5px 10px 0px 0; float:left;"><div class="fb-like" data-href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></div>
						<div style="margin: 5px 10px 0px 0; float:left;">
						<script src="https://apis.google.com/js/plusone.js"></script><g:plus action="share" annotation="bubble"></g:plus></div></div>
					</div>
					<div class="clearfix"></div>
					<div class="actions-jobs">
						<div class="col-sm-9">
						<h2><a href="{{URL::route('company.view', $job->ntd->company->id)}}">{{$job->ntd->company->company_name}}</a></h2>
						<h3>{{$job->ntd->company->company_address}}</h3>
						</div>
						<div class="col-sm-3">
						@if($job->is_apply == 1)
						@if(Sentry::check())
						<a href="{{URL::route('jobseekers.applying-job', array('login',$job->id))}}" class="pull-right btn btn-lg bg-orange">Nộp đơn</a>
						@else
						<a class="pull-right  btn btn-lg bg-orange" data-toggle="modal" href='#login-modal'>Nộp đơn</a>
						<div class="modal fade" id="login-modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h3 class="modal-title text-orange">Nộp hồ sơ ứng tuyển:</h3>
									</div>
									<div class="modal-body">
										<strong>Thành viên đăng nhập</strong> (Nếu bạn đã có hồ sơ tại <a href="{{URL::route('jobseekers.home')}}"><strong>Vnjobs.vn</strong></a>)
										<div class="notifications"></div>
									    {{ Form::open( array('class'=>'form form-horizontal', 'id'=>'LoginAjax') ) }}
									    	<div class="form-group">
									    		<div class="col-sm-5">
										    	{{Form::input('email','email',null, array('class'=>'form-control', 'id'=>'email'))}}
										    	</div>
									    	</div>
									    	<div class="form-group">
									    		<div class="col-sm-5">
									    			{{Form::input('password','password',null, array('class'=>'form-control', 'id'=>'password'))}}
									    		</div>
									    	</div>
									    	<div class="form-group push-bottom">
										   	{{Form::submit('Đăng nhập và Ứng tuyển', array('class'=>'btn btn-lg bg-orange'))}}
										   	</div>
									    {{ Form::close() }}
									</div>
									<div class="modal-footer">
										<strong>Nộp đơn ứng tuyển nhanh không cần đăng ký tài khoản</strong>
										<p>Bạn có thể nộp đơn ứng tuyển không cần đăng nhập hoặc chưa là thành viên của <a href="{{URL::route('jobseekers.home')}}" class="h3"><strong>Vnjobs.vn</strong></a></p>
										<a href="{{URL::route('jobseekers.applying-job', array('not-login',$job->id))}}" class="btn btn-lg bg-blue">Ứng tuyển ngay</a>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						@endif
						@else
						<button type="button" class="pull-right  btn btn-lg bg-orange" disabled="disabled">Công việc đã đóng</button>
						@endif
						</div>
					</div>
					<div class="alert alert-success hidden-xs"></div>
					<div class="clearfix link-list">
						<i class="fa fa-bookmark"></i>
						<a href="{{URL::route('jobseekers.save-job', array($job->id))}}">Lưu việc làm này</a>
						<i class="fa fa-envelope"></i>
						<a href="{{URL::route('jobseekers.notification-jobs', array('jobid'=>$job->id))}}">Gửi email việc làm tương tự</a>
						<i class="fa fa-share"></i>
						<strong><a class="share-to-friends" role="button" data-toggle="popover" data-placement="bottom" title="Giới Thiệu Việc Làm Đến Bạn Bè" data-content='<form role="form" class="form-horizontal" id="ShareToFriends"><div class="form-group"><input type="text" class="form-control first_name_friend" name="first_name_friend" placeholder="Họ"></div><div class="form-group"><input type="text" class="form-control last_name_friend" name="last_name_friend"  placeholder="Tên"></div><div class="form-group"><input type="email" class="form-control email_name_friend" name="email_name_friend" placeholder="Email"></div><div class="form-group"><button type="submit" class="btn btn-sm bg-orange pull-right">Giới thiệu</button></div></form>'>Giới thiệu bạn bè</a></strong>
						<i class="fa fa-comment"></i>
						@if(Sentry::check())
						<a class="feedback-to-emp" role="button" data-toggle="popover" data-placement="bottom"  title="Gửi tin nhắn đến Nhà tuyển dụng" data-content='<form role="form" class="form-horizontal" id="FeedbackToEmp"><div class="form-group"><input type="text" class="form-control title" name="title"  placeholder="Nhập tiêu đề"></div><div class="form-group"><textarea rows="3" name="feedback" class="form-control feedback" placeholder="Nhập nội dung phản hồi"></textarea></div><div class="form-group"><button type="submit" class="btn btn-sm bg-orange pull-right">Phản hồi</button></div></form>'>Gửi tin nhắn đến Nhà tuyển dụng</a>
						@else
						<a class="feedback-to-emp" role="button" data-toggle="popover" data-placement="bottom" title="Gửi tin nhắn đến Nhà tuyển dụng" data-content='Login để phản hồi'>Gửi tin nhắn đến Nhà tuyển dụng</a>
						@endif
					</div>
					<h2>Thông Tin Ví Trị Tuyển Dụng</h2>
					<table class="table table-striped table-hover table-bordered">
						<tbody>
							<tr>
								<td><strong>Chức vụ</strong></td>
								<td><a href="{{URL::route('jobseekers.search-job', array('level'=>$job->level->id))}}">{{$job->level->name}}</a></td>
								<td><strong>Số năm kinh nghiệm</strong></td>
								<td>{{$job->namkinhnghiem}}</td>
							</tr>
							<tr>
								<td><strong>Ngành nghề</strong></td>
								<td>
									@foreach($job->category as $key=>$val)
										<a href="{{URL::route('jobseekers.get-category', array('id'=>$job->category[$key]->category->id))}}">{{$job->category[$key]->category->cat_name}}</a><br>
									@endforeach
								</td>
								<td><strong>Yêu cầu bằng cấp</strong></td>
								<td>{{$job->education->name}}</td>
							</tr>
							<tr>
								<td><strong>Hình thức làm việc</strong></td>
								<td><a href="{{URL::route('jobseekers.search-job', array('type'=>$job->work->id))}}">{{$job->work->name}}</a></td>
								<td><strong>Yêu cầu giới tính</strong></td>
								<td>
								@if($job->gioitinh == 0)
									Không yêu cầu
								@elseif($job->gioitinh == 1)
									Nữ
								@else
									Nam
								@endif
								</td>
							</tr>
							<tr>
								<td><strong>Địa điểm</strong></td>
								<td>
									@foreach($job->province as $key=>$val)
										<a href="{{URL::route('jobseekers.search-job', array('province[]'=>$job->province[$key]->province->id))}}">{{$job->province[$key]->province->province_name}}</a><br>
									@endforeach
								</td>
								<td><strong>Yêu cầu độ tuổi</strong></td>
								<td>
									@if($job->dotuoi_min != '' && $job->dotuoi_max != '')
										{{$job->dotuoi_min}} - {{$job->dotuoi_max}}
									@elseif($job->dotuoi_min != '' && $job->dotuoi_max == '')
										Trên {{$job->dotuoi_min}}
									@elseif($job->dotuoi_max != '' && $job->dotuoi_min == '')
										Dưới {{$job->dotuoi_max}}
									@else
										Không yêu cầu
									@endif
								</td>
							</tr>
							<tr>
								<td><strong>Mức lương</strong></td>
								<td>@if($job->mucluong_min != 0 && $job->mucluong_min != 0)
										{{number_format($job->mucluong_min)}} - {{number_format($job->mucluong_max)}}đ
									@elseif($job->mucluong_max == 0 && $job->mucluong_min != 0)
										{{number_format($job->mucluong_min)}}đ
									@elseif($job->mucluong_min == 0 && $job->mucluong_max != 0)
										{{number_format($job->mucluong_max)}}đ
									@else 
										Thỏa thuận
									@endif</td>
								<td><strong>Số lượng cần tuyển</strong></td>
								<td>{{$job->sltuyen}}</td>
							</tr>
						</tbody>
					</table>
					<h2>Mô Tả Công Việc</h2>
					<div class="job-description">
						{{nl2br($job->mota)}}
					</div>
					<h2>Yêu Cầu Công Việc</h2>
					<div class="job-requirement">
						{{nl2br($job->yeucaukhac)}}
					</div>
					<h2>Quyền Lợi</h2>
					<div class="job-requirement">
						{{nl2br($job->quyenloi)}}
					</div>
					<h2>Hồ Sơ Bao Gồm</h2>
					<div class="job-requirement">
						{{nl2br($job->hosogom)}}
					</div>
					<h2>Hạn Nộp Hồ Sơ</h2>
					<div class="job-requirement">
						{{date('d-m-Y', strtotime($job->hannop))}}
					</div>
					<h2>Hình Thức Nộp Hồ Sơ</h2>
					<div class="job-requirement">
						@if($job->hinhthucnop == 0)
						Tất cả các hình thức
						@elseif($job->hinhthucnop == 1)
						Nhấn nút Nộp Đơn
						@elseif($job->hinhthucnop == 2)
						Qua Email
						@else
						Trực tiếp
						@endif
					</div>
				</div>
			</div>
			<div class="boxed">
				<div class="rows">
				<div class="title-page">
					<h2>Thông tin công ty</h2> 
				</div>
				<div class="company-info">
					<h3><a class="text-orange" href="{{URL::route('company.view', $job->ntd->company->id)}}">{{$job->ntd->company->company_name}}</a></h3>
					<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->ntd->company->company_address}}</span>
					<span><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Liên hệ: {{$job->nguoilienhe}}</span>
					<span><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Quy mô: {{Config::get('custom_quymo.quymo')[$job->ntd->company->total_staff]}}</span>
					@if(count(json_decode($job->ntd->company->company_images)))
					<div class="jcarousel-wrapper" id="company-info">
	                	<div class="jcarousel">
							<ul>
							@foreach(json_decode($job->ntd->company->company_images) as $img)
								<li>{{HTML::image('/uploads/companies/images/'.$img.'')}}</li>
							@endforeach
							</ul>
						</div>
						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
	                	<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
					@endif
					<p>{{nl2br($job->ntd->company->full_description)}}</p>
				</div>
				<a href="{{URL::route('jobseekers.search-job', array('id'=>$job->ntd_id))}}" class="pull-right text-blue"><i class="fa fa-arrow-circle-right"></i> Việc làm khác từ công ty này</a>
				</div>
			</div>
			@section('scripts')
				<script type="text/javascript">
					$(document).on('submit', '#ShareToFriends', function(event) {
						event.preventDefault();
						var url = '{{URL::route("jobseekers.post-view-job", array($job->slug,$job->id, "share"))}}';
						$.ajax({
							url: url,
							type: 'POST',
							dataType: 'json',
							data: {
								first_name_friend: $('.first_name_friend').val(),
								last_name_friend: $('.last_name_friend').val(),
								email_name_friend: $('.email_name_friend').val(),
							},
							success : function(json){
								if(! json.has)
					            {	
					            	$('#ShareToFriends').find(".has-error").removeClass('has-error');
						            $('#ShareToFriends').find(".error-message").remove();
					            	var j = $.parseJSON(json.message);
					            	$.each(j, function(index, val) {
						            	$('.'+index).parents('.form-group').addClass('has-error');
						            	if($('.'+index).parents('.form-group').find(".error-message").length < 1){
						           			$('.'+index).parents('.form-group').append('<span class="error-message">'+val+'</span>')
						            	}
						           		$('.loading-icon').hide();           		
					           		});
					            }else{
					           		$('#ShareToFriends').find(".has-error").removeClass('has-error');
					           		$('#ShareToFriends').find(".error-message").remove();
					           		$('.share-to-friends').popover('hide')

					           		$('.alert-success').slideDown('slow/400/fast', function() {
					           			$('.alert-success').removeClass('hidden-xs');
					           			$('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+json.message);
					           		});
									
					           	}
							}
						})
					});
					$(document).on('submit', '#FeedbackToEmp', function(event) {
						event.preventDefault();
						var url = '{{URL::route("jobseekers.post-view-job", array($job->slug,$job->id, "feedback"))}}';
						$.ajax({
							url: url,
							type: 'POST',
							dataType: 'json',
							data: {
								title : $('.title').val(),
								feedback: $('.feedback').val(),
								ntd_id: $('.ntd_id').val(),
							},
							success : function(json){
								if(! json.has)
					            {	
					            	$('#FeedbackToEmp').find(".has-error").removeClass('has-error');
						            $('#FeedbackToEmp').find(".error-message").remove();
					            	var j = $.parseJSON(json.message);
					            	$.each(j, function(index, val) {
						            	$('.'+index).parents('.form-group').addClass('has-error');
						            	if($('.'+index).parents('.form-group').find(".error-message").length < 1){
						           			$('.'+index).parents('.form-group').append('<span class="error-message">'+val+'</span>')
						            	}
						           		$('.loading-icon').hide();           		
					           		});
					            }else{
					           		$('#FeedbackToEmp').find(".has-error").removeClass('has-error');
					           		$('#FeedbackToEmp').find(".error-message").remove();
					           		$('.feedback-to-emp').popover('hide')

					           		$('.alert-success').slideDown('slow/400/fast', function() {
					           			$('.alert-success').removeClass('hidden-xs');
					           			$('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+json.message);
					           		});
									
					           	}
							}
						})
					});

					$('#LoginAjax').submit(function(event) {
						event.preventDefault();
						var url = '{{URL::action("JobSeekerAuth@loginAjax")}}';
						var result= '{{URL::route("jobseekers.applying-job", array("login", $job->id))}}';
						$.ajax({
							url: url,
							type: 'POST',
							dataType: 'json',
							data: {
								email: $('#email').val(),
								password: $('#password').val()
							},
							success : function(json){
								if(! json.has)
					            {	
					            	var j = $.parseJSON(json.message);
						            $.each(j, function(index, val) {
						            	$('.notifications').html('');
						            	$('.notifications').append('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+val+'</div>');      		
						           		});
					            }else{
					            	$('.notifications').html('');
					           		$('.notifications').append('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+json.message+'</div>');
					           		window.location.replace(result);
					           	}
							}
						});
					});
				</script>
			@stop
			@else
			<div class="boxed">
				<h2>Không tìm thấy công việc này</h2>
			</div>
			@endif
			<div class="boxed related-jobs">
				<div class="rows">
				<div class="title-page">
					<h2>Việc làm từ công ty khác</h2>
				</div>
				<ul class="arrow-square-orange">
					@if(count($jobs_for_widget) > 0)
						@foreach($jobs_for_widget as $job)
						<li><a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{$job->vitri}}</a></li>
						@endforeach
					@endif
					</ul>
				</div>
			</div>
			<!--
			<div class="social pull-right">
							<span>Chia sẻ: </span>
							<a href="#" class="rss" target="_blank" title="Rss"></a>
							<a href="#" class="facebook" target="_blank" title="Facebook"></a>
	                        <a href="#" class="twitter" target="_blank" title="Twitter"></a>
	                        <a href="#" class="linkedin" target="_blank" title="Linkedin"></a>
	                        <a href="#" class="pinterest" target="_blank" title="Pinterest"></a>
	                        <a href="#" class="dribble" target="_blank" title="Dribble"></a>
			</div>-->
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
				@include('includes.jobseekers.widget.right-suggested-jobs')
				
		</aside>

	</section>
@stop
