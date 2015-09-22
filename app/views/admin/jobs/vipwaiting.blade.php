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
	oTable =	$('#jobs').dataTable( {
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
				 

			});
		 
		 var input = $(".dataTables_filter input");
		input.unbind('keyup search input').bind('keypress', function (e) {
		    //if (e.which == 13) {
		       var keywords = bodauTiengViet(input.val()), filter ='';
		       	console.log(keywords);
		       /*for (var i=0; i<keywords.length; i++) {
		           filter = (filter!=='') ? filter+'|'+keywords[i] : keywords[i];
		       } */           
		       oTable.fnFilter(keywords, null, true, false, true, true);
		    //}
		});

	 
		 


		function bodauTiengViet(str) {  
			str= str.toLowerCase();  
			str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
			str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
			str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
			str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
			str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
			str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
			str= str.replace(/đ/g,"d");  
			return str;  
		}

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