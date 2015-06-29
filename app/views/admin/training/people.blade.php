@extends('layouts.admin')
@section('title')Danh sách @stop
@section('page-header') Danh sách học viên và giáo viên @stop
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
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Phone</th>
				<th>Email</th>
				@if($check==2)
				<th>Số người đăng ký</th>
				@else 
				<th>Cảm nhận</th>
				@endif
				<th>Thông tin khác</th>
				<th>Avatar</th>
				<th>Là</th>
				<th>Chương trình đào tạo</th>
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
				<td>{{$value['name']}}</td>				
				<td>{{$value['sex']}}</td>
				<td>{{$value['address']}}</td>
				<td>{{$value['phone']}}</td>
				<td>{{$value['email']}}</td>
				@if($check==2)
				<td>{{$value['feeling']}}</td>
				@else
				<td>
					<a data-toggle="modal" data-target="#myModal{{$value['id']}}">
  					Xem nội dung
					</a>	
					<div class="modal fade" id="myModal{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Nội dung</h4>
					      </div>
					      <div class="modal-body">
					        {{$value['feeling']}}
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				</td>
				@endif

				 
				 <td>
					<a data-toggle="modal" data-target="#myModal1{{$value['id']}}">
  					Xem nội dung
					</a>	
					<div class="modal fade" id="myModal1{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Nội dung</h4>
					      </div>
					      <div class="modal-body">

					      <p>Quá trình làm việc :  {{$value['worked']}}</p>
					      <p>Giới thiệu về bản thân :  {{$value['yourself']}}</p>
					      <p>Nick Facebook :  {{$value['facebook']}}</p>
					      <p>Nick Twitter :  {{$value['twitter']}}</p>
					      <p>Nick Skype :  {{$value['skype']}}</p>
					      <p>Nick Linkedin :  {{$value['linkedin']}}</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				</td>
				<td>
				@if($value['thumbnail']!=null)
				<a href="{{$value['thumbnail']}}" target="blank">{{HTML::image($value['thumbnail'],null,array('style' => 'width:100px'))}}</a>
				@else 
				Không có Avatar
				@endif
				</td>
				<td>{{$value['roll']}}</td>
				<td>{{$value['name_datao']}}</td>

				 
				 
				<td>
					<a class="btn btn-xs btn-info" title="sửa"  href="{{URL::to('admin/training/edit-people/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-people/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
		</tbody>

	</table>
	<a href="{{URL::to('admin/training/add-people')}}" class="btn">Thêm mới</a>
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


		$('#table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



			//click button xóa các mục đã chọn
			$( "#delete-check" ).click(function() {
	  			
			  var url = "{{URL::to('admin/training/delete-all-people')}}"; // the script where you handle the form input.
			   
			  
	 		  var check = $('input[name="ck[]"]:checked').map(function(){
	       		 return this.value;
	    		}).toArray();

	    		 $.ajax({
	             type: "POST",
	             url: url,
	             data: { check: check }, // serializes the form's elements.
	             success: function(data)
	             {
	             	console.log(data.success);
	             	
	                    // show response from the php script.
	                   if (data.success==true) {
	                     location.reload();
	                 	 alert('Đã xóa OK');  
	                 	}
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