@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="employers">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				
				
				<th>Nhà tuyển dụng</th>
				<th>Email</th>
				<th>Điện thoại</th>
				<th>Ngày đăng ký</th>
				<th>Trạng thái</th>
				<th>Tổng số tin đăng</th>
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
	var page1 = <?php if(isset($_GET['page']))
	 				echo $_GET['page'];
	 				else echo 0;
	 				 ?>;
		$('#employers').dataTable( {
				"displayStart": page1,
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('employers.datatables') }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,
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