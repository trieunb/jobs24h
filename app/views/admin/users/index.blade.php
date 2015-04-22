@extends('layouts.admin')
@section('title')Users Manager @stop
@section('content')
	<h2>Người tìm việc</h2>
	<hr>
	@include('includes.notifications')
	<table class="table table-hover table-bordered table-striped" id="jobseekers">
		<thead>
			<tr>
				<th>STT</th>
				<th>Username</th>
				<th>Họ Tên</th>
				<th>Email</th>
				<th>Ngày Sinh</th>
				<th>Địa Chỉ</th>
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
	{{ HTML::script('assets/js/dataTables.bootstrap.js') }}
	<script type="text/javascript">
		$('#jobseekers').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('users.datatables') }}",
				"aoColumnDefs": [
		        	{ 'bSortable': false, 'aTargets': [ 0 ] }
		        ],
				"aaSorting": [[ 0, "desc" ]],
				
				"fnDrawCallback": function (oSettings) {
					//if(oSettings.bSorted || oSettings.bFiltered) {
						var current = $('ul.pagination li.active a').text();
						var crshow = $('#jobseekers_length select option:selected').val();
						//alert(crshow);
						for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
							$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i]].nTr).html(i+1+(crshow*current-crshow));	

						}
					//}
				}
			});
		
	</script>
@stop