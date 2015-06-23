@extends('layouts.admin')
@section('title')Danh sách tin tức @stop
@section('page-header') Tin tức đã đăng @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped" id="jobseekers">
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
				<th>Nội dung giới thiệu</th>
				<th>Nội dung chính</th>
				<th>Ảnh đại diện</th>
				<th>Thuộc Thể loại</th>
				 
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($data as $value)
				<tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="ck" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{$value['id']}}</td>				
				<td>{{$value['title']}}</td>
				<td>{{$value['subtitle']}} giờ</td>
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
					        {{$value['content']}}
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				</td>
				<td>{{$value['thumbnail']}}</td>
				<td>{{$value['name_cat']}}</td>
				  
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/training/edit-post/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-post/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::to('admin/training/add-post')}}" class="btn">Đăng Khóa học mới</a>

	<div id="pagination">
		{{ $data->links() }}
	</div>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	 
@stop