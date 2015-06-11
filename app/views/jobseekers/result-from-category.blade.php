@extends('layouts.jobseeker')
@section('content')
	@include('includes.jobseekers.search')
	<section class="main-content container">
		@include('includes.jobseekers.breadcrumb')
		<section id="content" class="col-sm-9">
		<div class="boxed">
				<div class="search-by-categories clearfix">
					<div class="header-page">
						<h2>Tìm việc làm theo Ngành Nghề</h2>
					</div>
							<ul class="arrow-square-orange">
								@foreach ($categories as $key => $cate)
								<li class="col-sm-4">
									<strong><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate->id))}}">{{$cate->cat_name}}</a></strong> ({{$cate->mtcategory->count()}})
								</li>
								@endforeach
							</ul>
				</div>
			</div>
			<div class="boxed">
				<div class="filter">
					<span>Tìm thấy <span class="text-orange">{{count($jobs)}}</span> việc làm cho bạn</span>
					<span class="display-job-per-page pull-right">
					
					{{Form::open(array('route'=>array('jobseekers.get-category'),'method'=>'GET', 'id'=>'getPerPage' ))}}
						<span>Hiển thị</span>
						{{Form::select('perpage', array('20'=>'20 việc làm','30'=>'30 việc làm','50'=>'50 việc làm'), $per_page, array('class'=>'form-control', 'id'=>'perpage','name'=>'perpage','style'=>'width:125px'))}}
						<span>mỗi trang</span>
					{{Form::close()}}
					</span>
				</div>
				@if(isset($jobs))
				<div id="searchresult">
					<ul>
					@foreach($jobs as $job)
						<li>
							<div class="col-sm-2">
								<a href="#">{{HTML::image('../uploads/companies/images/'.$job->ntd->company->logo.'')}}</a>
								
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
									<a href="#" title="Tìm kiếm việc làm tương tự">{{HTML::image('assets/images/icons/search-job.png')}}</a>
									<a href="#" title="Lưu việc làm này">{{HTML::image('assets/images/icons/email-job.png')}}</a>
								</div>
								<a href="#" class="share-with-friend" title="Lưu việc làm này"><i class="glyphicon glyphicon-share-alt"></i> Giới thiệu bạn bè</a>
							</div>
						</li>
						@endforeach
					</ul>

				</div>
				<div class="text-center pagination-lg">
               		{{$jobs->links()}}
            	</div>
            	@endif
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
	<script type="text/javascript">
		// phân trang cho search
	    $('#perpage').change(function(event) {
	        event.preventDefault();
	        $('#getPerPage').submit();
	    });
	</script>
@stop