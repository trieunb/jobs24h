<div class="widget row">
					<h3>Việc làm theo cấp bậc</h3>
					<ul class="arrow-plus">
						@foreach($all_level as $level)
						<li><a href="{{URL::route('jobseekers.search-job', array('level'=>$level->id))}}">{{$level->name}}</a></li>
						@endforeach
					</ul>
				</div>