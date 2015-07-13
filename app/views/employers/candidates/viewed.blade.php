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
					
										<table class="table table-striped table-bordered">
											<thead>
												<tr class="center">
													<th>Tiêu đề CV</th>
													<th>Email đăng nhập</th>
													<th>Ngày cập nhật</th>	
												</tr>
											</thead>
											<tbody>
											@if(count($detail))
												@foreach ($detail as $order)
												<tr>
													<td>{{ $order->resume->tieude_cv }}</td>
													<td>{{ $order->email }}</td>
													<td>{{ $order->resume->getUpdateAt() }}</td>
													
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