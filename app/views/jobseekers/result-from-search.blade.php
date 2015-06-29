@extends('layouts.jobseeker')
@section('title') Kết quả việc làm - VnJobs @stop
@section('content')
	@include('includes.jobseekers.search')
	<section class="main-content container">
		<section id="content" class="col-sm-9">
			<div class="boxed">
				<div class="filter">
					<span>Tìm thấy <span class="text-orange">{{count($jobs)}}</span> việc làm cho bạn</span>
					<span class="display-job-per-page pull-right">
					
					{{Form::open(array('route'=>array('jobseekers.search-job'),'method'=>'GET', 'id'=>'getPerPage' ))}}
						<span>Hiển thị</span>
						{{Form::select('perpage', array('20'=>'20 việc làm','30'=>'30 việc làm','50'=>'50 việc làm'), $per_page, array('class'=>'form-control', 'id'=>'perpage','name'=>'perpage','style'=>'width:125px'))}}
						{{Form::input('hidden', 'keyword', $keyword)}}
						
						{{Form::select('province[]', Province::lists('province_name', 'id'),$province, array('class'=>'form-control chosen-select hidden-xs', 'id'=>'locationMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả địa điểm','multiple'))}}
						
						{{Form::select('categories[]', Category::lists('cat_name', 'id'),$categories, array('class'=>'form-control chosen-select hidden-xs', 'id'=>'categoryMainSearch', 'multiple'=>'true','data-placeholder'=>'Tất cả ngành nghề','multiple'))}}
						
						{{Form::input('hidden', 'salary', $salary)}}
						
						{{Form::input('hidden', 'level', $level)}}
						<span>mỗi trang</span>
					{{Form::close()}}
					</span>
				</div>
				<div id="searchresult">
					<ul>
					
					@foreach($jobs as $job)
						<li>
							<div class="col-sm-2">
								<a href="#">{{HTML::image('/uploads/companies/images/'.$job->ntd->company->logo.'')}}</a>
								
							</div>
							<div class="col-sm-5">
								<div class="job-title">
									<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{$job->vitri}}</a>
									<span class="new-tag">(Mới)</span>
								</div>
								<div class="job-info">
									{{$job->ntd->company->company_name}}
								</div>
								<div class="job-meta">
									<i class="glyphicon glyphicon-calendar"></i>
									Đăng tuyển: <span class="text-blue">{{date('d/m/Y',strtotime($job->updated_at))}}</span>
									<i class="glyphicon glyphicon-eye-open"></i>
									Số lượng xem: <span class="text-orange">{{$job->luotxem}}</span>
								</div>
							</div>
							<div class="col-sm-2">
								@foreach($job->province as $pv)
										{{ $pv->province->province_name }}<br>
										<?php $arr_province[] = $pv->province->id; ?>
									@endforeach
							</div>
							<div class="col-sm-3 pull-right">
								<div class="salary text-orange">
									<strong>
										@if($job->mucluong_max != 0)
											Tới ${{$job->mucluong_max}}
										@elseif($job->mucluong_max == 0 && $job->mucluong_min != 0)
											${{$job->mucluong_min}}
										@else 
											Thỏa thuận
										@endif
									</strong>
								</div>
								<div class="share">
									<a href="{{URL::route('jobseekers.save-job', array($job->id))}}" title="Lưu việc làm này">{{HTML::image('assets/images/icons/floppy-copy.png')}}</a>

									<a href="{{URL::route('jobseekers.search-job', array('keyword'=>$job->vitri, 'province'=> $arr_province))}}" title="Tìm kiếm việc làm tương tự">{{HTML::image('assets/images/icons/search-job.png')}}</a>
								</div>
								<a class="share-to-friends" role="button" data-toggle="popover" data-placement="bottom" title="Giới Thiệu Việc Làm Đến Bạn Bè" data-content='<div class="alert alert-success hidden-xs"></div><form role="form" class="form-horizontal" id="ShareToFriends"><div class="form-group"><input type="text" class="form-control first_name_friend" name="first_name_friend" placeholder="Họ"></div><div class="form-group"><input type="text" class="form-control last_name_friend" name="last_name_friend"  placeholder="Tên"></div><div class="form-group"><input type="email" class="form-control email_name_friend" name="email_name_friend" placeholder="Email"></div><div class="form-group"><button type="submit" class="btn btn-sm bg-orange pull-right">Giới thiệu</button></div><input type="hidden" value="{{$job->id}}" class="job_id" /><input type="hidden" value="{{$job->slug}}" class="job_slug" /></form>'><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="text-center pagination-lg">
               		{{$jobs->links()}}
            	</div>
			</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
			@include('includes.jobseekers.widget.categories-hot')
			@include('includes.jobseekers.widget.browse-jobs-by-level')
			@include('includes.jobseekers.widget.browse-jobs-by-object')	
		</aside>
	</section>
@stop
@section('scripts')
@parent
	<script type="text/javascript">
		// phân trang cho search
	    $('#perpage').change(function(event) {
	        event.preventDefault();
	        $('#getPerPage').submit();
	    });
	</script>
	
	<script type="text/javascript">
		$(document).on('submit', '#ShareToFriends', function(event) {
			event.preventDefault();

			var url = '{{ URL::route("jobseekers.post-view-job", array(":slug",":id", "share")) }}';
			url = url.replace(':id', $(this).find('.job_id').val());
			url = url.replace(':slug', $(this).find('.job_slug').val());
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					first_name_friend: $(this).find('.first_name_friend').val(),
					last_name_friend: $(this).find('.last_name_friend').val(),
					email_name_friend: $(this).find('.email_name_friend').val(),
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
		           		$('.alert-success').slideDown('slow/400/fast', function() {
		           			$('.alert-success').removeClass('hidden-xs');
		           			$('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+json.message);
		           		});
						$('.share-to-friends').popover('hide')
		           	}
				}
			})
			
			
		});
	</script>
@stop