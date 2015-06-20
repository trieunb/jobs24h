@extends('layouts.employer')
@section('title') Quản lý đăng tuyển - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.jobs_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="header-image">
					DS <span class="text-blue">{{ $title }}</span>
				</div>
				<div class="box bg-white">
									{{ Form::open(array('method'=>'POST', 'route'=>'employers.jobs.action')) }}
										@include('includes.notifications')
										<table class="table table-striped table-bordered">
											<thead>
												<tr class="center">
													<th>
														<div class="checkbox">
															<input type="checkbox" id="selectall" value="">
															<label>
																<span></span>
															</label>
														</div>
													</th>
													<th>Chức danh</th>
													<th>Mã số</th>
													<th>Ngành</th>
													<th>Nơi làm việc</th>
													<th>#</th>
												</tr>
											</thead>
											<tbody>
											@if(count($jobs))
												@foreach ($jobs as $job)
												<tr>
													<td class="center">
														<div class="checkbox">
															<input name="job[]" type="checkbox" class="check" value="{{ $job->id }}">
															<label>
																<span></span>
															</label>
														</div>
													</td>
													<td><a href="{{ URL::route('jobseekers.job', [$job->slug, $job->id]) }}" target="_blank">{{ $job->vitri }}</a></td>
													<td>{{ $job->matin }}</td>
													<td>
													@foreach($job->category as $cate)
														{{ $cate->category->cat_name }}<br>
													@endforeach
													</td>
													<td>
													@foreach($job->province as $pv)
														{{ $pv->province->province_name }}<br>
													@endforeach
													</td>
													<td>
														<a href="{{ URL::route('employers.jobs.edit', $job->id) }}" class="btn btn-mini btn-action btn-info"><i class="glyphicon glyphicon-pencil"></i></a>
														<a href="{{ URL::route('employers.jobs.delete', $job->id) }}" class="btn btn-mini btn-action btn-danger" onclick="return confirm('Bạn có muốn xóa công việc này ?');"><i class="glyphicon glyphicon-trash"></i></a>
													</td>
												</tr>
												@endforeach
											@else
												<tr>
													<td>&nbsp;</td>
													<td colspan="5">Không có tin hiển thị</td>
												</tr>
											@endif
											</tbody>
										</table>
										<div class="list-actions">
										{{ Form::button('Đăng tuyển', array('type'=>'submit', 'name'=>'submit', 'value'=>'active', 'class'=>'btn btn-default')) }}
										{{ Form::button('Ngừng đăng', array('type'=>'submit', 'name'=>'submit', 'value'=>'inactive', 'class'=>'btn btn-default')) }}
										{{ Form::button('Ngưng nhận HS', array('type'=>'submit', 'name'=>'submit', 'value'=>'unapply', 'class'=>'btn btn-default')) }}
										{{ Form::button('Mở nhận HS', array('type'=>'submit', 'name'=>'submit', 'value'=>'apply', 'class'=>'btn btn-default')) }}
										{{ Form::button('Xóa', array('type'=>'submit', 'name'=>'submit', 'value'=>'delete', 'class'=>'btn btn-default', 'onclick'=>"return confirm('Bạn có muốn xóa công việc đã chọn ?');")) }}
										</div>
										<div class="clearfix"></div>
										<div id="pagination" class="pull-right pagination-sm pagination-blue push-top">
											{{ $jobs->links() }}
										</div>
										{{ Form::close() }}
					</div>
					<div class="box find-my-recruitment">
						<div class="heading-image">
							<h2 class="text-blue">{{ HTML::image('assets/ntd/images/search-lg.png') }} Tìm tuyển dụng của tôi</h2>
						</div>
									<?php if( ! isset($input) ) $input = ['keyword'=>'','nganhnghe'=>[],'noilamviec'=>'','ngaydang1'=>'','ngaydang2'=>'','ngayhethan1'=>'','ngayhethan2'=>'']; ?>
									<?php if( ! isset($input['nganhnghe']) ) $input['nganhnghe'] = []; ?>
										<form action="{{ URL::route('employers.jobs.search') }}" method="GET" class="form-horizontal" role="form">
											<div class="form-group">
												<label for="inputKeyword" class="col-sm-4 control-label">Từ khóa:</label>
												<div class="col-sm-6">
													{{ Form::text('keyword', $input['keyword'] ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-4 control-label">Ngành nghề:</label>
												<div class="col-sm-6">
													{{ Form::select('nganhnghe[]', Category::getList(), $input['nganhnghe'], array('class'=>'form-control chosen-select', 'multiple') ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="inputNoilamviec" class="col-sm-4 control-label">Nơi làm việc:</label>
												<div class="col-sm-6">
													{{ Form::select('noilamviec', array('all'=>'Tất cả') + Province::lists('province_name', 'id'), $input['noilamviec'] ) }}
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-4 control-label">
													<div class="checkbox pull-right">
														<label>
															<input type="checkbox" value="">
															<strong>Ngày đăng</strong>
														</label>
													</div>
												</label>
												<div class="col-sm-3">
													<p>Từ</p>
													<div class="input-group date" id="">
										                {{ Form::text('ngaydang1', $input['ngaydang1'], ['class'=>'datepicker form-control'] ) }}
										                <span class="input-group-addon have-img">
										                	{{ HTML::image('assets/ntd/images/calendar.png') }}
										            	</span>
										            </div>
												</div>
												<div class="col-sm-3">
													<p>Đến</p>
													<div class="input-group date" id="">
										                {{ Form::text('ngaydang2', $input['ngaydang2'], ['class'=>'datepicker form-control'] ) }}
										                <span class="input-group-addon have-img">
										                   	{{ HTML::image('assets/ntd/images/calendar.png') }}
										            	</span>
										            </div>
												</div>
											</div>
											<div class="form-group">
												<label for="input" class="col-sm-4 control-label">
													<div class="checkbox pull-right">
														<label>
															<input type="checkbox" value="">
															<strong>Ngày kết thúc</strong>
														</label>
													</div>
												</label>
												<div class="col-sm-3">
													<p>Từ</p>
													<div class="input-group date" id="">
										                {{ Form::text('ngayhethan1', $input['ngayhethan1'], ['class'=>'datepicker form-control'] ) }}
										                <span class="input-group-addon have-img">
										                	{{ HTML::image('assets/ntd/images/calendar.png') }}
										            	</span>
										            </div>
												</div>
												<div class="col-sm-3">
													<p>Đến</p>
													<div class="input-group date" id="">
										                {{ Form::text('ngayhethan2', $input['ngayhethan2'], ['class'=>'datepicker form-control'] ) }}
										                <span class="input-group-addon have-img">
										                   	{{ HTML::image('assets/ntd/images/calendar.png') }}
										            	</span>
										            </div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-4 col-sm-7">
													<button type="submit" class="btn btn-lg bg-orange">Tìm</button>
												</div>
											</div>
										</form>
									</div>
			</section>
		</div>
	</section>
@stop

@section('style')
	{{ HTML::style('assets/css/chosen.min.css') }}
	{{ HTML::style('assets/css/datepicker.min.css') }}
	<style type="text/css">
		.center {
			text-align: center;
			vertical-align: middle;
		}
		.btn-action {
			padding: 1px 6px;
		}
	</style>
@stop

@section('script')
	{{ HTML::script('assets/js/chosen.jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap-datepicker.min.js') }}
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#selectall').click(function(event) {  //on click 
	        if(this.checked) { // check select status
	            $('.check').each(function() { //loop through each checkbox
	                this.checked = true;  //select all checkboxes with class "checkbox1"               
	            });
	        }else{
	            $('.check').each(function() { //loop through each checkbox
	                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
	            });         
	        }
	    });
	    $('.chosen-select').chosen({allow_single_deselect:true, max_selected_options: 3}); 
		$('input.datepicker').datepicker({
			format: "yyyy-mm-dd",
			clearBtn: true,
			language: "vi",
			autoclose: true
		});
	    
	});
	</script>
@stop