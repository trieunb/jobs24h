@extends('layouts.admin')
@section('title')Danh sách @stop
@section('page-header') Danh sách học viên và giáo viên @stop
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
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Facebook</th>
				<th>Twitter</th>
				<th>Skype</th>
				<th>Linkedin</th>
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
						<input type="checkbox" name="ck" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{$value['name']}}</td>				
				<td>{{$value['sex']}}</td>
				<td>{{$value['address']}}</td>
				<td>{{$value['phone']}}</td>
				<td>{{$value['email']}}</td>
				<td>{{$value['facebook']}}</td>
				<td>{{$value['twitter']}}</td>
				<td>{{$value['skype']}}</td>
				<td>{{$value['linkedin']}}</td>
				<td>{{HTML::image($value['thumbnail'],null,array('style' => 'width:100%'))}}</td>
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