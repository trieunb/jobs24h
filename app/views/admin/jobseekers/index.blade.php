@extends('layouts.admin')
@section('title')Jobseeker Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="row">
		<div class="col-sm-3">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td class="col-sm-9">Tổng số NTV đã đăng kí</td>
					<td  style="text-align:right"><strong>{{$totalNTV}}</strong></td>
				</tr>
				<tr>
					<td class="col-sm-9">Tổng số NTV chưa kích hoạt</td>
					<td  style="text-align:right"><strong>{{$ntvUnactive}}</strong></td>
				</tr>
			</tbody>
		</table>
		</div>

	</div>
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="jobseekers">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>SĐT</th>
				<th>Ngày đăng ký</th>
				<th>CSKH</th>
				<th>Hồ sơ</th>
				<th>Ứng tuyển</th>
				<th>Đính kèm</th>
				<th>Tư cách</th>
				<th>Trạng thái</th>
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
		$('#jobseekers').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('jobseekers.datatables') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null,null, null, null,null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});

		var active_class = 'success';
		$('#jobseekers > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#jobseekers').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
@stop