@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')


	<div class="clearfix"></div>
	<div class="col-md-3">
	{{Form::select('active',array(
	''=>'Lựa chọn trạng thái',
	URL::route("admin.employers.index",array("active"=>''))=>'Cả 2',
	URL::route("admin.employers.index",array("active"=>'0')) => 'Không kích hoạt',
	URL::route("admin.employers.index",array("active"=>'1'))=>'Kích hoạt'),
	array('id'=>'active'))}}
	</div>
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
				<th>
					Trạng thái 
					
				</th>
				<th>Tổng số tin đăng</th>
				<th>#</th>
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

	$('select').on('change', function() {
  		var active = $(this).val();
  		window.location.href = active;
	});


	 

	var page1 = <?php if(isset($_GET['page']))
	 				echo $_GET['page'];
	 				else echo 0;
	 				 ?>;
	/* var chuaduyet=<?php if(isset($_GET['is_active']))
	 				echo $_GET['is_active'];
	 				else echo 0;
	 				 ?>;*/
	   oTable =	$('#employers').dataTable( {
				"displayStart": page1,
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "{{ URL::route('employers.datatables',["active"=>Input::get('active')]) }}",
				bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false, "sClass": "center" },
					  null, null,null, null, null, null,null,
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

		var search = getParameterByName('Search');
	 	if(search!='') 
       	 	{
       	 		 var keywords = bodauTiengViet(search), filter ='';
       	 		 oTable.fnFilter(keywords);
       	 	}
	 	
		 
       	function getParameterByName(name) {
			    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
			        results = regex.exec(location.search);
			    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}

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