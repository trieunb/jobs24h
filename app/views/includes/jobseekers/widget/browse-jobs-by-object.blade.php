<div class="widget row">
	<h3>Việc làm theo đối tượng</h3>
	<ul class="arrow-plus">
		<li><a href="{{URL::route('jobseekers.search-job', array('salary'=>1000))}}">Việc làm 1000$+</a></li>
		<li><a href="{{URL::route('jobseekers.search-job', array('level'=>2))}}">Mới tốt nghiệp</a></li>
		<li><a href="{{URL::route('jobseekers.search-job', array('level'=>5))}}">Quản lý điều hành</a></li>
		<li><a href="{{URL::route('jobseekers.search-job', array('type'=>3))}}">Bán thời gian</a></li>
		<li><a href="{{URL::route('jobseekers.search-job', array('type'=>4))}}">Tự do</a></li>
		<li><a href="{{URL::route('jobseekers.search-job', array('type'=>2))}}">Tạm thời/Dự án</a></li>
	</ul>
</div>