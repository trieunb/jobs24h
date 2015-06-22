@extends('layouts.admin')
@section('title')Danh sách training @stop
@section('page-header') Danh sách các tài liệu hiện có @stop
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
				<th>Tiêu đề</th>
				<th>Nội dung giới thiệu</th>
				<th>Tác giả</th>
				<th>Ảnh đại diện</th>
				<th>Lượt view</th>
				<th>Lượt Download</th>
				<th>Link tài liệu</th>
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
				<td>{{$value['title']}}</td>				
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
				<td>{{$value['author']}}</td>
				<td>{{HTML::image($value['thumbnail'],null,array('style' => 'width:100%'))}}</td>
				<td>{{$value['view']}}</td>
				<td>{{$value['download']}}</td>
				<td>{{$value['store']}}</td>
				 

				 
				 
				<td>
					<a class="btn btn-xs btn-info" title="sửa"  href="{{URL::to('admin/training/edit-document/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/training/delete-document/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
		</tbody>

	</table>
	<a href="{{URL::to('admin/training/add-document')}}" class="btn">Thêm mới</a>

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