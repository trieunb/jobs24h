@extends('layouts.admin')
@section('title')Danh sách chương trình đào tạo @stop
@section('page-header') Chương trình đào tạo @stop
@section('content')
@include('includes.notifications')
	
		 

	
	<div class="clearfix"></div>
	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-bank"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Tổng số khóa học</div>
			<span class="infobox-data-number">{{ $total_khoahoc }}</span>
		</div>

											<!-- <div class="stat stat-success">8%</div> -->
	</div>	
	<div class="infobox infobox-blue">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-credit-card"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Đang khai giảng</div>
			<span class="infobox-data-number"><?php 
			$i=0;
			
			foreach ($data as $key => $value) {
				if (strtotime($value['date_open'])>strtotime(date('Y-m-d'))) {
					 $i=$i+1;
				}

			} 
			echo $i;
			?>

			</span>
		</div>

		<!-- <div class="badge badge-success">
			+32%
			<i class="ace-icon fa fa-arrow-up"></i>
		</div> -->
	</div>


	<table class="table table-hover table-bordered table-striped dataTable" id="table">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Tiêu đề</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($data as $value)
				<tr>
				<td>
					<label class="pos-rel">
						<input value="{{$value['id']}}" type="checkbox" name="ck[]" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{$value['id']}}</td>				
				<td><a target="_blank" href="{{URL::action('TrainingController@detail_couser',$value['id'])}}">{{$value['title']}}</a></td>
		
				<td>
					<a class="btn btn-xs btn-info" title="sửa"  href="{{URL::to('admin/training/edit-couser/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					 
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
		</tbody>

	</table>
	<a href="{{URL::to('admin/training/add-couser')}}" class="btn">Đăng Khóa học mới</a>
	<div class="btn" id="delete-check">Xóa tất cả mục đã chọn</div>

	 
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	 <script>$(document).ready(function() {
    $('#table').dataTable();
	} );
	 var active_class = 'success';
		$('#table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
		$( "#delete-check" ).click(function() {
	  			
			  var url = "{{URL::to('admin/training/delete-all-couser')}}"; // the script where you handle the form input.
			
			
	 		  
	 		  var check = $('input[name="ck[]"]:checked').map(function(){
	       		 return this.value;
	    		}).toArray();

	    		 $.ajax({
	             type: "POST",
	             url: url,
	             data: {  check: check }, // serializes the form's elements.
	             success: function(data)
	             {
	                    // show response from the php script.
	                  // show response from the php script.
	                    if (data.success==true) {
	                     location.reload();
	                 	 alert('Đã xóa OK');  }
	                 	 else{
	                 	 	alert('Không thể xóa');
	                 	 	location.reload();
	                 	 }
	                 	 	


	             }
	            });

	          return false; // avoid to execute the actual submit of the form.
			
			});
	   
	  </script>
@stop