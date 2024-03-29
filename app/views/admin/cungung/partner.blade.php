@extends('layouts.admin')
@section('title')Danh sách dịch vụ @stop
@section('page-header') Các đối tác trong Cung ứng Lao động @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-star-o"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">Có {{ $total_all_parner }}</span>
			<div class="infobox-content">đối tác</div>
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
				<th>Tên đối tác</th>
				<th>Link đối tác</th>
				<th>Logo</th>
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
				<td>{{$value['name']}}</td>
				 <td>{{$value['link']}}</td>
				 
				<td><a href="{{$value['banner']}}"  target="_blank">{{HTML::image(URL::to('uploads/cungunglaodong/'.$value['thumbnail'].''),$value['title'],array('style'=>'width:100px'))}}</a></td>
				 
				  
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/cungunglaodong/edit-partner/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/cungunglaodong/delete-partner/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::to('admin/cungunglaodong/add-partner')}}" class="btn">Thêm Đối Tác</a>
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
	  			
			  var url = "{{URL::to('admin/cungunglaodong/delete-all-partner')}}"; // the script where you handle the form input.
			
			
	 		  
	 		  var check = $('input[name="ck[]"]:checked').map(function(){
	       		 return this.value;
	    		}).toArray();
	 		  	console.log(check);
	    		 $.ajax({
	             type: "POST",
	             url: url,
	             data: {  check: check }, // serializes the form's elements.
	             success: function(data)
	             {
	             	console.log(data.success);
	                    // show response from the php script.
	                  // show response from the php script.
	                   if (data.success==true) {
	                     location.reload();
	                 	 alert('Đã xóa OK');  }
	                 	 else{
	                 	 	alert('Không thể xóa');
	                 	 	//location.reload();
	                 	 }


	             }
	            });

	          return false; // avoid to execute the actual submit of the form.
			
			});


		</script>
@stop