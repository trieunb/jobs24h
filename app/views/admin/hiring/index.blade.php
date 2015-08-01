@extends('layouts.admin')
@section('title')Quản lý bài viết Cẩm nang việc làm @stop
@section('page-header')Danh sách quản trị viên @stop
@section('content')
	@include('includes.notifications')
	<a href="{{ URL::route('admin.hiring.create') }}" class="btn btn-success pull-right">Thêm mới</a>
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="hiring">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>Tiêu đề</th>
				<th>Thumbnail</th>
				<th>Người đăng</th>
				<th>Danh mục</th>
				<th>Mục con</th>
				<th>Lượt xem</th>
				<th>Action</th>
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
		$('#hiring').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('admin.hiring.datatables') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true, "sClass": "center" },
					  null, null, null, null, null, null,
					  { "bSortable": false }
					],

				"aoColumnDefs": [
		        	{ 'bSortable': false, 'aTargets': [ 0 ] }
		        ],
				"aaSorting": [[ 0, "desc" ]],
				
			});

		var active_class = 'success';
		$('#hiring > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#hiring').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
	
@stop