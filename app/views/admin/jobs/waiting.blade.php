@extends('layouts.admin')
@section('title')Waiting Jobs Manager @stop
@section('page-header')Danh sách tin đăng cần duyệt @stop
@section('content')
	@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="col-sm-12 infobox-container">
		<div class="infobox infobox-green">
			<div class="infobox-icon">
				
				<i class="ace-icon fa fa-bank"></i>
			</div>

			<div class="infobox-data">
				 <a href="{{URL::route('admin.jobs.waiting')}}">
					<div class="infobox-content">Tổng số tin chưa duyệt</div>
					<span class="infobox-data-number">{{ $job_not_active }}</span>
				 </a>
			</div>

			<!-- <div class="stat stat-success">8%</div> -->
		</div>
	</div>
 
	
	 
	<table class="table table-hover table-bordered table-striped" id="jobs">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<!-- <th>ID</th> -->
				<th>Tin tuyển dụng</th>
				<th>Nhà tuyển dụng</th>
				<!-- <th>Mã tin</th> -->
				<th>Cập nhật</th>
				<th>Hạn nộp</th>
				<th>Tình trạng đăng</th>
				<th>Trạng thái</th>
				<th>Hành động</th>
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
				"sAjaxSource": "{{ URL::route('admin.jobs.datatables_waiting', ["id"=>Input::get('id')]) }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
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