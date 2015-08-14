@extends('layouts.admin')
@section('title')Danh sách tin tức @stop
@section('page-header') Tin tức đã đăng @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-newspaper-o"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Tổng số tin tức</div>
			<span class="infobox-data-number">{{ $total_news }}</span>
		</div>

		<!-- <div class="stat stat-success">8%</div> -->
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
				<td><a target="_blank" href="{{URL::action('TrainingController@detail_post',$value['id'])}}">{{$value['title']}}</a></td>
				 
				  
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/training/edit-post/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-post/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::to('admin/training/add-post')}}" class="btn">Đăng Tin mới</a>

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



			//click button xóa các mục đã chọn
			$( "#delete-check" ).click(function() {
	  			
			  var url = "{{URL::to('admin/training/delete-all-post')}}"; // the script where you handle the form input.
			 
			  
	 		  var check = $('input[name="ck[]"]:checked').map(function(){
	       		 return this.value;
	    		}).toArray();

	    		 $.ajax({
	             type: "POST",
	             url: url,
	             data: { check: check }, // serializes the form's elements.
	             success: function(data)
	             {
	                    // show response from the php script.
	                  	 if (data.success==true) {
		                     location.reload();
		                 	 alert('Đã xóa OK');  }
	                 	 else
	                 	 {
	                 	 	alert('Không thể xóa'); 
	                 	 	location.reload();
	                 	 }
	             }
	            });

	          return false; // avoid to execute the actual submit of the form.
	      });
	  
	  </script>
@stop