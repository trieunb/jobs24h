@extends('layouts.admin')
@section('title')Danh sách chương trình đào tạo @stop
@section('page-header') Chương trình đào tạo @stop
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
				<th>Thời lượng</th>
				<th>Học phí</th>
				<th>Ngày khai giảng</th>
				<th>Ca</th>
				<th>Ngày học</th>
				<th>Giờ học</th>
				<th>Nội dung</th>
				<th>Giảm giá</th>
				<th>Giảng viên</th>
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
				<td>{{$value['time_day']}} giờ</td>
				<td>{{$value['fee']}}</td>
				<td>{{$value['date_open']}}</td>
				<td>{{$value['shift']}}</td>
				<td>{{$value['date_study']}}</td>
				<td>{{$value['time_hour']}} buổi</td>
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
				<td>{{$value['discount']}}</td>
				<td>{{$value['name_teacher']}}</td>
				<td>
					<a href="">Sửa</a>
					<br>
					 <a href="">Xóa</a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	 
@stop