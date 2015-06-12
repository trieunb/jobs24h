@extends('layouts.jobseeker')
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
						<h1>{{$job->vitri}}</h1>	
						<h2>{{$job->ntd->company->company_name}}</h2>
						<a href="{{URL::route('jobseekers.applying-job', array($job->id))}}" class="btn btn-lg bg-orange">Nộp đơn</a>
					</div>
					<div class="alert alert-success hidden-xs"></div>
					<div class="clearfix link-list">
						<i class="fa fa-bookmark"></i>
						<a href="{{URL::route('jobseekers.save-job', array($job->id))}}">Lưu việc làm này</a>
						<i class="fa fa-envelope"></i>
						<a href="{{URL::route('jobseekers.notification-jobs', array('jobid'=>$job->id))}}">Gởi email việc làm tương tự</a>
						<i class="fa fa-share"></i>
						<strong><a class="share-to-friends" role="button" data-toggle="popover" data-placement="bottom" title="Giới Thiệu Việc Làm Đến Bạn Bè" data-content='<form role="form" class="form-horizontal" id="ShareToFriends"><div class="form-group"><input type="text" class="form-control first_name_friend" name="first_name_friend" placeholder="Họ"></div><div class="form-group"><input type="text" class="form-control last_name_friend" name="last_name_friend"  placeholder="Tên"></div><div class="form-group"><input type="email" class="form-control email_name_friend" name="email_name_friend" placeholder="Email"></div><div class="form-group"><button type="submit" class="btn btn-sm bg-orange pull-right">Giới thiệu</button></div></form>'>Giới thiệu bạn bè</a></strong>
					</div>
					<h2>Mô Tả Công Việc</h2>
					<div class="job-description">
						{{$job->mota}}
					</div>
					<h2>Yêu cầu công việc</h2>
					<div class="job-requirement">
						{{$job->yeucaukhac}}
					</div>
					<h2>Quyền lợi</h2>
					<div class="job-requirement">
						{{$job->quyenloi}}
					</div>
				</div>
			</div>
			<div class="boxed">
				<div class="rows">
				<div class="title-page">
					<h2>Thông tin vị trí tuyển dụng</h2> 
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>Job Level</td>
							<td>{{$job->chucvu}}</td>
						</tr>
						<tr>
							<td>Salary</td>
							<td>{{$job->mucluong_min}}-{{$job->mucluong_max}}</td>
						</tr>
						<tr>
							<td>Industry</td>
							<td>
								@foreach($job->category as $key=>$val)
									{{$job->category[$key]->category->cat_name}}<br>
								@endforeach
							</td>
						</tr>
						<tr>
							<td>Location</td>
							<td>
								@foreach($job->province as $key=>$val)
									{{$job->province[$key]->province->province_name}}<br>
								@endforeach
							</td>
						</tr>
						<tr>
							<td>Job Type</td>
							<td>{{$job->work->name}}</td>
						</tr>
						<tr>
							<td>Posted</td>
							<td>10 Apr 2015</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			<div class="boxed">
				<div class="rows">
				<div class="title-page">
					<h2>Thông tin công ty</h2> 
				</div>
				<div class="company-info">
					<h3 class="text-orange">{{$job->ntd->company->company_name}}</h3>
					<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{$job->ntd->company->company_address}}.</span>
					<span><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact person: {{$job->nguoilienhe}}.</span>
					<span><i class="fa fa-user"></i>&nbsp;&nbsp;Company size: {{$job->ntd->company->total_staff}}.</span>
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
					<p>{{$job->ntd->company->full_description}}</p>
				</div>
				<a href="{{URL::route('jobseekers.search-job', array('id'=>$job->ntd_id))}}" class="pull-right text-blue"><i class="fa fa-arrow-circle-right"></i> Việc làm khác từ công ty này</a>
				</div>
			</div>
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
						@foreach($jobs_for_widget as $job)
						<li><a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{$job->vitri}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="social pull-right">
							<span>Chia sẻ: </span>
							<a href="#" class="rss" target="_blank" title="Rss"></a>
							<a href="#" class="facebook" target="_blank" title="Facebook"></a>
	                        <a href="#" class="twitter" target="_blank" title="Twitter"></a>
	                        <a href="#" class="linkedin" target="_blank" title="Linkedin"></a>
	                        <a href="#" class="pinterest" target="_blank" title="Pinterest"></a>
	                        <a href="#" class="dribble" target="_blank" title="Dribble"></a>
						</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
				@include('includes.jobseekers.widget.right-suggested-jobs')
				
		</aside>
	</section>
@stop
	@section('scripts')
	<script type="text/javascript">
		$(document).on('submit', '#ShareToFriends', function(event) {
			event.preventDefault();
			var url = '{{URL::route("jobseekers.share-job", array($job->slug,$job->id))}}';
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
	</script>
@stop