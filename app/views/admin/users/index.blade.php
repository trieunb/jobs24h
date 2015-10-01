@extends('layouts.admin')
@section('title')Users Manager @stop
@section('page-header')Danh sách quản trị viên @stop
@section('content')
	@include('includes.notifications')
	<a href="{{ URL::route('admin.users.create') }}" class="btn btn-success pull-right">Thêm mới</a>
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="administrator">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Ngày tạo</th>
				<th>Action</th>
				<th>Quyền hạn</th>
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
		$('#administrator').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('users.datatables') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null, null, null,null,
					  { "bSortable": false }
					],

				"aoColumnDefs": [
		        	{ 'bSortable': false, 'aTargets': [ 0 ] }
		        ],
				"aaSorting": [[ 1, "desc" ]],
				
			});

		var active_class = 'success';
		$('#administrator > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#administrator').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
	
@stop