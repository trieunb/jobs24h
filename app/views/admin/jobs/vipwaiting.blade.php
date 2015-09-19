@extends('layouts.admin')
@section('title')Waiting VIP Jobs Manager @stop
@section('page-header')Danh sách tin VIP cần duyệt @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	
	
	<!-- <form action="{{ URL::route('admin.jobs.vipwaiting') }}" method="GET" class="form" role="form" id="search">
	<div class="col-sm-12">
			<div class="col-sm-8">
				{{ Form::text('q',null, array('class'=>'form-control', 'placeholder'=>'Nhập tìm kiếm ', 'id'=>'search_input') ) }}
			</div>
			<div class="col-sm-4">
				<button type="submit" class="btn btn-sm btn-primary" id="search">Tìm kiếm</button>
			</div>
	</div>
	</form> -->
		
	<div class="clearfix"></div>
	<div class="col-sm-12">
		<form action="" method="POST" class="form-inline" role="form">
			
		
		<div class="col-sm-12">
		<table class="table table-hover table-bordered table-striped" id="jobs">
			<thead>
				<tr>
					<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
					<th>Tin tuyển dụng</th>
					<th>Nhà tuyển dụng</th>
					<th>Cập nhật</th>
					<th>Hết hạn nộp</th>
					<th>Trạng thái</th>
					<th>Dịch vụ</th>
					<th>Ghi Chú</th>
					
					<th>#</th>
					<th>CSKH</th>
				</tr>
			</thead>
			<tbody>
				 
			</tbody>
		</table>
		</div>
		</form>
	</div>
	 
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

				"sAjaxSource": "{{ URL::route('admin.jobs.datatables_waiting_vip', ["id"=>Input::get('id')]) }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
				columns: [
	            {data: 'id', name: 'jobs.id'},
	            {data: 'ntd_id', name: 'jobs.vitri'},
	            {data: 'matin', name: 'jobs.vitri'},
	            {data: 'vitri', name: 'jobs.updated_at'},
	            {data: 'chucvu', name: 'jobs.hannop'},
	            {data: 'namkinhnghiem', name: 'jobs.is_display'},
	            {data: 'bangcap', name: 'jobs.orderpostrec'},
	            {data: 'hinhthuc', name: 'jobs.hinhthuc'},
	            {data: 'bangcap', name: 'jobs.gioitinh'},
	            {data: 'dotuoi_min', name: 'jobs.dotuoi_min','searchable':false},
        		]

			});
		 


	$('.btn-duyet').click(function(event) {
		var thisId = this.id;
		var jobid = thisId.split('_');
		var status = $(this).val();
		jobid = jobid[1];
		$.ajax({
			url: '{{ URL::route('admin.jobs.ajax') }}',
			type: 'POST',
			data: {action: 'accept_job', jobid: jobid, status: status},
			success: function(json)
			{
				$('#td_status_'+jobid).html('<span class="label label-primary">Đã duyệt</span>');
				$('#td_duyet_'+jobid).html('&nbsp;');
				$('#td_checkbox_'+jobid).html('&nbsp;');
			}
		})
	});

	$('#jobs > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
		var th_checked = this.checked;//checkbox inside "TH" table header
		
		$(this).closest('table').find('tbody > tr').each(function(){
			var row = this;
			if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
		});
	});
		var active_class = 'success';
		$('#jobs').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
	</script>


@stop