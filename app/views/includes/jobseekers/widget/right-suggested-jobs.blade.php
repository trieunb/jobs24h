<div class="widget row">
	<h3>Việc làm phù hợp</h3>
	<ul>
		@foreach($jobs_for_widget as $job)
		<li>
			<div class="col-sm-3">
				<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}">{{HTML::image('/uploads/companies/logos/'.$job->ntd->company->logo.'')}}</a>
			</div>
			<div class="col-sm-9">
				<a href="{{URL::route('jobseekers.job', array($job->slug, $job->id))}}"><strong>{{$job->vitri}}</strong></a>
				<div>{{$job->ntd->company->company_name}}, <span class="text-orange">@if($job->mucluong_max != 0)
											Tới ${{$job->mucluong_max}}
										@elseif($job->mucluong_max == 0 && $job->mucluong_min != 0)
											${{$job->mucluong_min}}
										@else 
											Thỏa thuận
										@endif</span></div>
			</div>
		</li>
		@endforeach
	</ul>
</div>