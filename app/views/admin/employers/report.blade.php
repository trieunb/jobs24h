@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-sm-12 infobox-container">
			<div class="infobox infobox-green">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-user"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">110/440</span>
					<div class="infobox-content">Các liên hệ</div>
				</div>
			</div>

			<div class="infobox infobox-blue">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-group"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{$ntd_vip}}</span>
					<div class="infobox-content">NTD VIP</div>
				</div>
			</div>

			<div class="infobox infobox-pink">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-eye"></i>
				</div>

				<div class="infobox-data">
					<a href="{{URL::route('admin.jobs.waiting')}}">
						<span class="infobox-data-number">{{$job_not_active}}</span>
						<div class="infobox-content">Tin chưa duyệt</div>
					</a>
				</div>
				<!-- <div class="stat stat-important">4%</div> -->
			</div>

			<div class="infobox infobox-red">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-file"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">0</span>
					<div class="infobox-content">Tin VIP chưa duyệt</div>
				</div>
			</div>
		</div>
	</div>
	<table class="table table-hover table-bordered table-striped" id="employers">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				
				<th>Nhà tuyển dụng vip</th>
				<th>Xác thực</th>
				<th>Gói</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày hết hạn</th>
				<th>Loại tham gia</th>
				<th>Số ngày còn lại</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	<script type="text/javascript">
		$('#employers').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('employers.datatablesvip') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});

		var active_class = 'success';
		$('#employers > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#employers').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
	
@stop