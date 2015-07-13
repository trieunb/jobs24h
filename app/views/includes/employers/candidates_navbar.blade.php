<div class="widget row menu-management-resume">
	<h3>Quản lý hồ sơ</h3>
	<ul class="menu-images-icons">
		
		<li class="{{ HTML::active(['employers.candidates.job', 'employers.candidates.index']) }}">
			<a href="{{ URL::route('employers.candidates.job', 'all') }}"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ ứng tuyển<br><small>(Chưa đăng ký xem hồ sơ)</small></span></a>
  			<ul>
  				@if(count($job_name))
					@foreach($job_name as $value)
						<li class="{{ HTML::active(['employers.candidates.job'], 'selected', $value->id) }}"><a href="{{ URL::route('employers.candidates.job', $value->id) }}" title="{{ $value->vitri }}">{{ Str::limit($value->vitri,25) }} ({{ $value->application->count() }})</a></li>
					@endforeach
  				@else
					<li><a href="#" onclick="return false;">Bạn chưa có tin tuyển dụng nào</a></li>
  				@endif
  				
  			</ul>

		</li>
		<li class="{{ HTML::active(['employers.candidates.folder', 'employers.candidates.folderManager']) }}">
			<a href="{{ URL::route('employers.candidates.folder', 'all') }}"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ đã lưu</span></a>
  			<ul>
  				@if(count($folders))
					@foreach($folders as $value)
						<li class="{{ HTML::active(['employers.candidates.folder'], 'selected', $value->id) }}"><a href="{{ URL::route('employers.candidates.folder', $value->id) }}"><i class="fa fa-folder-o"></i>{{ $value->folder_name }} ({{ $value->rsfolder->count() }})</a></li>
					@endforeach
  				@endif
  				<li class="{{ HTML::active(['employers.candidates.folderManager'], 'selected') }}"><a href="{{ URL::route('employers.candidates.folderManager') }}">Quản lý thư mục</a></li>
  				
  			</ul>
		</li>
		<li class="{{ HTML::active(['employers.candidates.deleted']) }}">
			<a href="{{ URL::route('employers.candidates.deleted') }}"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Hồ sơ đã xóa</span></a>
		</li>
		<li class="{{ HTML::active(['employers.candidates.blocked']) }}">
			<a href="{{ URL::route('employers.candidates.blocked') }}"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Danh sách từ chối</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-plus-square-o fa-2x"></i><span class="text-orange">Số HS đã xem/HS được xem(12/100)</span></a>
		</li>
	</ul>
</div>