@extends('layouts.admin')
@section('title')Jobs Manager @stop
@section('content')

 
  
	@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="col-sm-12 infobox-container">
		<div class="infobox infobox-green">
			<div class="infobox-icon">
				
				<i class="ace-icon fa fa-bank"></i>
			</div>

			<div class="infobox-data">
				 <a href="{{URL::route('admin.jobs.index')}}">
					<div class="infobox-content">Tổng số tin tuyển dụng</div>
					<span class="infobox-data-number">{{ $job_total }}</span>
				 </a>
			</div>

			<!-- <div class="stat stat-success">8%</div> -->
		</div>
	 
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
				<!-- <th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th> -->
				<th>ID</th>
				<th>Tin tuyển dụng</th>
				<th>Nhà tuyển dụng</th>
				<th>Cập nhật</th>
				<th>Hết hạn nộp</th>
				<th>Loại tin</th>
				
				<th>Tình trạng đăng</th>
				<th>Trạng thái</th>
				<th>Số Lượt xem</th>
				<th>Số Lượt nộp</th>
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
	 	 
		oTable=$('#jobs').dataTable( {
				"displayStart": page1,
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('jobs.datatables', ["id"=>Input::get('id'),"web"=>Input::get('web')]) }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,null,null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [[ 1, "desc" ]],
			});
		  var input = $(".dataTables_filter input");
		input.unbind('keyup search input').bind('keypress', function (e) {
		    if (e.which == 13) {
		       var keywords = bodauTiengViet(input.val()), filter ='';
		      // 	console.log(keywords);
		       /*for (var i=0; i<keywords.length; i++) {
		           filter = (filter!=='') ? filter+'|'+keywords[i] : keywords[i];
		       } */           
		       oTable.fnFilter(keywords);
		    }
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