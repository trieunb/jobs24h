@extends('layouts.admin')
@section('title')Resumes Manager @stop
@section('page-header')Danh sách hồ sơ @stop
@section('content')
	@include('includes.notifications')
	<div class="row">
		<div class="col-sm-3">
		<table class="table table-bordered">
			<tbody>

				<tr>
					<td class="col-sm-9">Tổng số Hồ sơ chưa duyệt</td>
					<td  style="text-align:right"><strong>{{$hosochuakichhoat}}</strong></td>
				</tr>
			</tbody>
		</table>
		</div>

	</div>
	<div class="clearfix"></div>
	
	<table class="table table-hover table-bordered table-striped" id="resumes">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th class="col-sm-3">Tiêu đề</th>
				<th>Họ tên</th>
				<th>Ngày tạo</th>
				<th>CSKH</th>
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
		$('#resumes').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('resumes.datatables.not-active') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});

		var active_class = 'success';
		$('#resumes > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#resumes').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>

@stop