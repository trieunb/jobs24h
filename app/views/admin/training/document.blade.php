@extends('layouts.admin')
@section('title')Danh sách training @stop
@section('page-header') Danh sách các tài liệu hiện có @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="infobox infobox-pink">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-eye"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Tổng số tài liệu</div>
			<span class="infobox-data-number">{{ $total_doc }}</span>
		</div>
		<!-- <div class="stat stat-important">4%</div> -->
	</div>


	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-user"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Tổng số lượt view</div>
			<span class="infobox-data-number">{{ $total_view }}</span>
		</div>

		<!-- <div class="stat stat-success">8%</div> -->
	</div>

	<div class="infobox infobox-blue">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-group"></i>
		</div>

		<div class="infobox-data">
			
			<div class="infobox-content">Tổng số lượt tải tài liệu</div>
			<span class="infobox-data-number">{{ $total_down }}</span>
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
				<th>Tiêu đề</th>
				<th>Lượt view</th>
				<th>Lượt Download</th>
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
				<td><a target="_blank" href="{{URL::action('TrainingController@detail_doc',$value['id'])}}">{{$value['title']}}</a></td>
				<td>{{$value['view']}}</td>
				<td>{{$value['download']}}</td>
				<td>
					<a class="btn btn-xs btn-info" title="sửa"  href="{{URL::to('admin/training/edit-document/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					 
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-document/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
		</tbody>

	</table>
	<a href="{{URL::to('admin/training/add-document')}}" class="btn">Thêm mới</a>
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
	  			
			  var url = "{{URL::to('admin/training/delete-all-doc')}}"; // the script where you handle the form input.
			  var cat = "{{Request::segment(3)}}";
			  
	 		  var check = $('input[name="ck[]"]:checked').map(function(){
	       		 return this.value;
	    		}).toArray();

	    		 $.ajax({
	             type: "POST",
	             url: url,
	             data: { cat: cat, check: check }, // serializes the form's elements.
	             success: function(data)
	             {
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