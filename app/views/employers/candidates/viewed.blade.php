@extends('layouts.employer')
@section('title') Danh sách hồ sơ đã xem - VnJobs @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.candidates_navbar')
			</aside>
			<section id="content" class="pull-right right">
				<div class="header-image">
					QUẢN LÝ <span class="text-blue">ỨNG VIÊN</span>
				</div>
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-orange">Danh sách hồ sơ đã xem</h2>
					</div>
					<table class="table table-bordered table-blue-bordered white rs-table">
						<thead>
							<tr>
								<th>
									<div class="checkbox">
										<input type="checkbox" id="selectall" value="">
										<label>
											<span></span>
										</label>
									</div>
								</th>
								<th>Tên hồ sơ</th>
								<th>&nbsp;</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@if(count($detail))
							@foreach ($detail as $order)
							<tr>

								@if($order->resume->ntv_id > 0)
								<td>
									<div class="checkbox">
										<input type="checkbox" name="valid[]" class="check" value="{{ $order->id }}">
										<label>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<a href="{{ URL::route('employers.search.resumeinfo', $order->rs_id) }}" class="text-blue decoration"><strong>{{ $order->resume->ntv->full_name() }}</strong></a>
									
									<i class="fa fa-caret-square-o-right"></i>
									
									<br>
									Chức danh: {{ $order->resume->cvganday }}<br>
									Địa Điểm: @if(count($order->resume->location)) 
										@foreach($order->resume->location as $l)
											@if($l->province_id > 0)
											{{ $l->province->province_name }},
											@endif
										@endforeach
									@endif
									<br>
								</td>
								<td>
									Ngày tạo: {{ date('Y-m-d', strtotime($order->resume->created_at)) }}<br>
									Cập nhật: {{ $order->resume->getUpdateAt() }}<br>
									
								</td>
								<td>
									<div class="dropdown">
									  <a id="dropdown{{ $order->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Thao tác
									    <span class="fa fa-list"></span>
									  </a>
									  <ul class="dropdown-menu" aria-labelledby="dropdown{{ $order->id }}">
									    <li><a id="s_{{$order->rs_id}}" class="modalSaveFolder">Lưu thư mục</a></li>
									    <li><a id="lt_{{$order->id}}" class="modalSendLetter">Gửi thông báo</a></li>
									    <li><a id="p_{{$order->rs_id}}" href="{{ URL::route('employers.search.print_cv', $order->rs_id) }}" target="_blank" class="printCV">In</a></li>
									  </ul>
									</div>
									
								</td>
								@else
								<td>
									<div class="checkbox">
										<input type="checkbox" name="valid[]" class="check" value="{{ $order->id }}">
										<label>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<a href="{{ URL::route('employers.search.resumeinfo', $order->rs_id) }}" class="text-blue decoration"><strong>{{ $order->resume->application->first()->full_name() }}</strong></a>
									<span class="fa fa-paperclip"></span>
									<br>
									Chức danh: {{ $order->resume->application->first()->headline }}<br>
									Địa Điểm: {{ $order->resume->application->first()->address }}
									<br>
								</td>
								<td>
									Ngày tạo: {{ date('Y-m-d', strtotime($order->resume->created_at)) }}<br>
									Cập nhật: {{ $order->resume->getUpdateAt() }}<br>
									
								</td>
								<td>
									<div class="dropdown">
									  <a id="dropdown{{ $order->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Thao tác
									    <span class="fa fa-list"></span>
									  </a>
									  <ul class="dropdown-menu" aria-labelledby="dropdown{{ $order->id }}">
									    <li><a id="s_{{$order->rs_id}}" class="modalSaveFolder">Lưu thư mục</a></li>
									    <li><a id="p_{{$order->rs_id}}" href="{{ URL::route('employers.search.print_cv', $order->rs_id) }}" target="_blank" class="printCV">In</a></li>
									  </ul>
									</div>
									
								</td>
								@endif
							</tr>
							@endforeach
							@else
								<tr>
									<td colspan="5">Không có hồ sơ</td>
								</tr>
							@endif
						</tbody>
					</table>
					
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
			padding: 5px 10px;
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