@extends('layouts.admin')
@section('title') Application Jobs @stop
@section('content')

 
  
	@include('includes.notifications')
	<div class="clearfix"></div>
	 
	
	<table class="table table-hover table-bordered table-striped" id="jobs">
		<thead>
			<tr>
				<!-- <th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th> -->
				<th>ID</th>
				<th>Tiêu đề hồ sơ</th>
				<th>Họ và tên</th>
				<th>Ngày ứng tuyển</th>
				<th>Trạng thái</th>
				<th>Thao tác</th>
				<th>CSKH</th>
				
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
		$('#jobs').dataTable( {
				"displayStart": page1,
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('admin.jobs.datatables_cvapp', ["id"=>Input::get('id')]) }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});
		 
		var active_class = 'success';
		$('#jobs > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#jobs').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});

		
	</script>
	
@stop