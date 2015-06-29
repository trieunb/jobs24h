@extends('layouts.admin')
@section('title')Cung ứng dịch vụ @stop
@section('page-header') Nội dung của các dịch vụ @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
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
				<th>Nội dung chính</th>
				<th>Thuộc dịch vụ</th>
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
				<td>{{$value['title']}}</td>
				 
				<td>
					<a data-toggle="modal" data-target="#myModal{{$value['id']}}">
  					Xem nội dung
					</a>
					<style>
						.modal-body img {
 						 width: 100% !important;
						}					
					</style>	
					<div class="modal fade" id="myModal{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Nội dung</h4>
					      </div>
					      <div class="modal-body">
					        {{$value['content']}}
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				</td>
 				  <td>{{$value['name']}}</td>
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/cungunglaodong/edit-post-services/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-post-services/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::to('admin/cungunglaodong/add-post-services')}}" class="btn">Đăng Tin mới</a>
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
	  			
			  var url = "{{URL::to('admin/cungunglaodong/delete-all-post')}}"; // the script where you handle the form input.
			
			
	 		  
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